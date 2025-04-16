<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ResearchRepository;
use App\Models\Dissertation;

class HistoryController extends Controller
{
    /**
     * Display user's research history.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $user = Auth::user();
        
        // Get student research projects
        $userProjects = ResearchRepository::where('user_id', $user->id)
            ->where(function($query) {
                $query->whereNull('faculty_research')
                    ->orWhere('faculty_research', false);
            })
            ->latest()
            ->get();
        
        // Get faculty research projects
        $facultyResearch = ResearchRepository::where('user_id', $user->id)
            ->where('faculty_research', true)
            ->latest()
            ->get();
        
        // Get dissertations
        $dissertations = Dissertation::where('user_id', $user->id)
            ->latest()
            ->get();
        
        // Return the view with all three types of research
        return view('history', compact('userProjects', 'facultyResearch', 'dissertations'));
    }
}