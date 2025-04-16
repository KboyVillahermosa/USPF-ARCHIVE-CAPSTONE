<?php

namespace App\Http\Controllers;

use App\Models\FacultyResearch;
use App\Models\ResearchRepository;
use App\Models\Dissertation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FacultyResearchController extends Controller
{
    /**
     * Show the form for creating a new faculty research.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Make sure the view path is correct
        return view('faculty_upload');
    }

    /**
     * Store a newly created faculty research in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'project_name' => 'required|string|max:255',
            'members' => 'required|string',
            'department' => 'required|string',
            'abstract' => 'required',
            'file' => 'required|file|mimes:pdf,doc,docx',
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        // Create new research entry with faculty_research flag set to true
        $facultyResearch = new \App\Models\ResearchRepository();
        $facultyResearch->user_id = Auth::id();
        $facultyResearch->project_name = $request->project_name;
        $facultyResearch->members = $request->members;
        $facultyResearch->department = $request->department;
        $facultyResearch->abstract = $request->abstract;
        $facultyResearch->faculty_research = true; // Mark as faculty research
        $facultyResearch->approved = 0; // Default to not approved
        
        // Handle banner image upload
        if ($request->hasFile('banner_image')) {
            $path = $request->file('banner_image')->store('faculty/banners', 'public');
            $facultyResearch->banner_image = $path;
        }

        // Handle research file upload
        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('faculty/files', 'public');
            $facultyResearch->file = $path;
        }

        $facultyResearch->save();

        return redirect()->route('research.history')
            ->with('success', 'Your faculty research has been submitted and is awaiting approval.');
    }

    /**
     * Display research history.
     */
    public function history()
    {
        $user = Auth::user();
        
        // Get student research projects
        $userProjects = \App\Models\ResearchRepository::where('user_id', $user->id)
            ->where(function($query) {
                $query->whereNull('faculty_research')
                    ->orWhere('faculty_research', false);
            })
            ->latest()
            ->get();
        
        // Get faculty research from research_repositories table
        $facultyResearch = \App\Models\ResearchRepository::where('user_id', $user->id)
            ->where('faculty_research', true)
            ->latest()
            ->get();
        
        // Get dissertations if that model exists
        // If you don't have a separate dissertation model, you can adapt this query
        $dissertations = \App\Models\Dissertation::where('user_id', $user->id)
            ->latest()
            ->get();
        
        return view('history', compact('userProjects', 'facultyResearch', 'dissertations'));
    }

    /**
     * Display a listing of faculty research.
     */
    public function index()
    {
        // Get all approved faculty research
        $facultyResearch = \App\Models\ResearchRepository::where('faculty_research', true)
            ->where('approved', 1)
            ->latest()
            ->paginate(12);
        
        // Get list of departments that have faculty research for filtering
        $departments = \App\Models\ResearchRepository::where('faculty_research', true)
            ->where('approved', 1)
            ->distinct()
            ->pluck('department');
        
        return view('faculty.index', compact('facultyResearch', 'departments'));
    }

    /**
     * Display the specified faculty research.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $research = FacultyResearch::findOrFail($id);
        
        // Increment view count if viewing an approved research
        if ($research->approved) {
            $research->increment('view_count');
        }
        
        return view('faculty.show', compact('research'));
    }

    /**
     * Show the form for editing the specified faculty research.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $research = FacultyResearch::findOrFail($id);
        
        // Make sure only the owner can edit
        if ($research->user_id != Auth::id()) {
            return redirect()->route('research.history')
                ->with('error', 'You do not have permission to edit this research.');
        }
        
        return view('faculty.edit', compact('research'));
    }

    /**
     * Update the specified faculty research in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $research = FacultyResearch::findOrFail($id);
        
        // Make sure only the owner can update
        if ($research->user_id != Auth::id()) {
            return redirect()->route('research.history')
                ->with('error', 'You do not have permission to update this research.');
        }
        
        // Validate the request
        $request->validate([
            'project_name' => 'required|string|max:255',
            'members' => 'required|string',
            'department' => 'required|string',
            'abstract' => 'required|string',
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'file' => 'nullable|file|mimes:pdf,doc,docx',
        ]);
        
        // Update the research
        $research->project_name = $request->project_name;
        $research->members = $request->members;
        $research->department = $request->department;
        $research->abstract = $request->abstract;
        
        // Handle banner image upload if provided
        if ($request->hasFile('banner_image')) {
            // Delete old banner image if it exists
            if ($research->banner_image) {
                Storage::disk('public')->delete($research->banner_image);
            }
            
            $path = $request->file('banner_image')->store('faculty/banners', 'public');
            $research->banner_image = $path;
        }
        
        // Handle research file upload if provided
        if ($request->hasFile('file')) {
            // Delete old file if it exists
            if ($research->file) {
                Storage::disk('public')->delete($research->file);
            }
            
            $path = $request->file('file')->store('faculty/files', 'public');
            $research->file = $path;
        }
        
        $research->save();
        
        return redirect()->route('research.history')
            ->with('success', 'Faculty research updated successfully.');
    }
}