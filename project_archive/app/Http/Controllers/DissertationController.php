<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dissertation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DissertationController extends Controller
{
    public function create()
    {
        return view('dissertation.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'type' => 'required|in:dissertation,thesis',
            'abstract' => 'required|string',
            'department' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'file' => 'required|file|mimes:pdf,doc,docx|max:10240',
            'keywords' => 'required|string|max:255',
        ]);

        $file = $request->file('file');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = 'dissertations/' . $fileName;
        
        // Store the file
        Storage::disk('public')->put($filePath, file_get_contents($file));

        // Create dissertation record
        $dissertation = new Dissertation();
        $dissertation->title = $request->title;
        $dissertation->author = $request->author;
        $dissertation->type = $request->type;
        $dissertation->abstract = $request->abstract;
        $dissertation->department = $request->department;
        $dissertation->year = $request->year;
        $dissertation->file_path = $filePath;
        $dissertation->keywords = $request->keywords;
        $dissertation->user_id = Auth::id();
        $dissertation->status = 'pending';
        $dissertation->save();

        // Redirect to the main history page with all submissions
        return redirect()->route('history')
            ->with('success', 'Your ' . ucfirst($request->type) . ' has been uploaded successfully and is pending approval.');
    }

    public function show($id)
    {
        $dissertation = Dissertation::findOrFail($id);
        
        // Increment view count
        $dissertation->increment('view_count');
        
        // Get related dissertations
        $relatedDissertations = Dissertation::where('id', '!=', $id)
            ->where(function($query) use ($dissertation) {
                $query->where('department', $dissertation->department)
                      ->orWhere('type', $dissertation->type)
                      ->orWhere('keywords', 'like', '%' . $dissertation->keywords . '%');
            })
            ->where('status', 'approved')
            ->take(10)
            ->get();
        
        // Debug file path information
        $filePath = $dissertation->file_path;
        $fullPath = storage_path('app/public/' . $filePath);
        $fileExists = file_exists($fullPath);
        $storagePath = storage_path('app/public');
        $publicUrl = asset('storage/' . $filePath);
        
        return view('dissertation.show', compact(
            'dissertation', 
            'relatedDissertations',
            'fileExists',
            'fullPath',
            'storagePath',
            'publicUrl'
        ));
    }

    public function history()
    {
        // Get user's dissertations and theses
        $dissertations = Dissertation::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();
        
        // Redirect to the main history page with the dissertation tab active
        return redirect()->route('history')
            ->with('activeTab', 'dissertation');
    }

    public function index(Request $request)
    {
        $category = $request->get('category', 'dissertations');
        
        // Get dissertations
        if ($category === 'dissertations' || $category === 'all') {
            $query = Dissertation::where('status', 'approved');
            
            // Apply filters
            if ($request->filled('type')) {
                $query->where('type', $request->type);
            }
            
            if ($request->filled('department')) {
                $query->where('department', $request->department);
            }
            
            if ($request->filled('year')) {
                $query->where('year', $request->year);
            }
            
            if ($request->filled('search')) {
                $search = '%' . $request->search . '%';
                $query->where(function($q) use ($search) {
                    $q->where('title', 'like', $search)
                      ->orWhere('author', 'like', $search)
                      ->orWhere('keywords', 'like', $search);
                });
            }
            
            $dissertations = $query->orderBy('created_at', 'desc')->paginate(12);
            
            if ($category === 'dissertations') {
                return view('dissertation.index', compact('dissertations'));
            }
        }
        
        // Get research papers
        if ($category === 'student' || $category === 'faculty' || $category === 'all') {
            $query = \App\Models\ResearchRepository::where('approved', 1);
            
            // Filter by type
            if ($category === 'faculty') {
                $query->where('is_faculty', 1);
            } elseif ($category === 'student') {
                $query->where('is_faculty', 0);
            }
            
            // Apply filters
            if ($request->filled('department')) {
                $query->where('department', $request->department);
            }
            
            if ($request->filled('curriculum')) {
                $query->where('curriculum', $request->curriculum);
            }
            
            if ($request->filled('year')) {
                $query->whereYear('created_at', $request->year);
            }
            
            if ($request->filled('search')) {
                $search = '%' . $request->search . '%';
                $query->where(function($q) use ($search) {
                    $q->where('project_name', 'like', $search)
                      ->orWhere('members', 'like', $search)
                      ->orWhere('keywords', 'like', $search);
                });
            }
            
            $projects = $query->orderBy('created_at', 'desc')->paginate(12);
            
            if ($category === 'student' || $category === 'faculty') {
                return view('dissertation.index', compact('projects'));
            }
        }
        
        // For 'all' category, we need both types
        if ($category === 'all') {
            // We already have both $dissertations and $projects from above
            return view('dissertation.index', compact('dissertations', 'projects'));
        }
        
        // Default fallback
        return view('dissertation.index', ['dissertations' => collect()]);
    }

    /**
     * Handle the download request for a dissertation.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function download(Request $request, $id)
    {
        // Find the dissertation
        $dissertation = Dissertation::findOrFail($id);
        
        // Validate that file exists
        $path = storage_path('app/public/' . $dissertation->file_path);
        
        if (!file_exists($path)) {
            return back()->with('error', 'File not found on server. Please contact administrator.');
        }
        
        // Record download purpose
        $purpose = $request->input('purpose', []);
        $otherPurposeText = $request->input('other_purpose_text');
        
        // Log the download (optional but recommended)
        \Log::info('Dissertation download', [
            'dissertation_id' => $id,
            'user_id' => auth()->id(),
            'purpose' => $purpose,
            'other_purpose' => $otherPurposeText
        ]);
        
        // Increment download counter
        $dissertation->increment('download_count');
        
        // Return the file as download
        $filename = $dissertation->title . ' - ' . $dissertation->author . '.pdf';
        $cleanFilename = preg_replace('/[^a-zA-Z0-9_\-\.]/', '_', $filename);
        
        return response()->download($path, $cleanFilename);
    }
}