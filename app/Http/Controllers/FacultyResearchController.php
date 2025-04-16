<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\ResearchRepository;

class FacultyResearchController extends Controller
{
    public function create()
    {
        return view('upload_faculty');
    }

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

        $research = new ResearchRepository();
        $research->user_id = Auth::id();
        $research->project_name = $request->project_name;
        $research->members = $request->members;
        $research->department = $request->department;
        $research->abstract = $request->abstract;
        
        // Set this flag to distinguish faculty research from student research
        $research->faculty_research = true;
        
        // Handle file uploads
        if ($request->hasFile('banner_image')) {
            $path = $request->file('banner_image')->store('faculty/banners', 'public');
            $research->banner_image = $path;
        }
        
        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('faculty/files', 'public');
            $research->file = $path;
        }
        
        $research->save();
        
        return redirect()->route('research.history')
            ->with('success', 'Faculty research has been submitted and is awaiting approval.');
    }

    public function show($id)
    {
        $research = ResearchRepository::findOrFail($id);
        
        // Check if user is authorized to view this research
        if (!Auth::user()->isAdmin() && $research->user_id != Auth::id() && !$research->approved) {
            abort(403, 'Unauthorized action.');
        }
        
        return view('research.faculty.show', compact('research'));
    }

    public function edit($id)
    {
        $research = ResearchRepository::findOrFail($id);
        
        // Check if user is authorized to edit this research
        if (!Auth::user()->isAdmin() && $research->user_id != Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
        
        return view('research.faculty.edit', compact('research'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'project_name' => 'required|string|max:255',
            'members' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'abstract' => 'required|string',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:10240',
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $research = ResearchRepository::findOrFail($id);
        
        // Check if user is authorized to update this research
        if (!Auth::user()->isAdmin() && $research->user_id != Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
        
        // Reset approval status if it was previously approved
        if ($research->approved) {
            $research->approved = false;
        }

        $research->project_name = $request->project_name;
        $research->members = $request->members;
        $research->department = $request->department;
        $research->abstract = $request->abstract;

        if ($request->hasFile('file')) {
            // Delete old file if exists
            if ($research->file && Storage::disk('public')->exists($research->file)) {
                Storage::disk('public')->delete($research->file);
            }
            
            $path = $request->file('file')->store('research/faculty', 'public');
            $research->file = $path;
        }

        if ($request->hasFile('banner_image')) {
            // Delete old banner if exists
            if ($research->banner_image && Storage::disk('public')->exists($research->banner_image)) {
                Storage::disk('public')->delete($research->banner_image);
            }
            
            $path = $request->file('banner_image')->store('research/banners', 'public');
            $research->banner_image = $path;
        }

        $research->save();

        return redirect()->route('research.history')
            ->with('success', 'Faculty research has been updated and is awaiting approval.');
    }

    public function history()
    {
        $user = Auth::user();
        
        // Get regular research projects
        $userProjects = ResearchRepository::where('user_id', $user->id)
            ->where('faculty_research', false)
            ->orderBy('created_at', 'desc')
            ->get();
            
        // Get faculty research projects
        $facultyResearch = ResearchRepository::where('user_id', $user->id)
            ->where('faculty_research', true)
            ->orderBy('created_at', 'desc')
            ->get();
            
        // Get dissertations (if you have a separate model for them)
        $dissertations = \App\Models\Dissertation::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();
            
        return view('research.history', compact('userProjects', 'facultyResearch', 'dissertations'));
    }
}