<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ResearchRepository;
use App\Models\Dissertation;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('q');
        $department = $request->input('department');
        $yearFrom = $request->input('year_from');
        $yearTo = $request->input('year_to');
        
        if (empty($query) || strlen($query) < 3) {
            return response()->json([]);
        }
        
        // Search in research repositories
        $researchQuery = ResearchRepository::where('approved', true)
            ->where(function($q) use ($query) {
                $q->where('project_name', 'like', "%{$query}%")
                  ->orWhere('members', 'like', "%{$query}%")
                  ->orWhere('abstract', 'like', "%{$query}%")
                  ->orWhere('keywords', 'like', "%{$query}%");
            });
            
        // Apply department filter if provided
        if (!empty($department)) {
            $researchQuery->where('department', $department);
        }
        
        // Apply year filters if provided
        if (!empty($yearFrom)) {
            $researchQuery->whereYear('created_at', '>=', $yearFrom);
        }
        
        if (!empty($yearTo)) {
            $researchQuery->whereYear('created_at', '<=', $yearTo);
        }
        
        $research = $researchQuery->select('id', 'project_name as title', 'members', 'department', 'abstract', 'keywords', 'view_count', 'download_count', 'created_at')
            ->selectRaw("'research' as type")
            ->limit(20)
            ->get();
            
        // Search in dissertations
        $dissertationQuery = Dissertation::where('status', 'approved')
            ->where(function($q) use ($query) {
                $q->where('title', 'like', "%{$query}%")
                  ->orWhere('author', 'like', "%{$query}%")
                  ->orWhere('abstract', 'like', "%{$query}%")
                  ->orWhere('keywords', 'like', "%{$query}%");
            });
            
        // Apply department filter if provided
        if (!empty($department)) {
            $dissertationQuery->where('department', $department);
        }
        
        // Apply year filters if provided
        if (!empty($yearFrom)) {
            $dissertationQuery->whereYear('created_at', '>=', $yearFrom);
        }
        
        if (!empty($yearTo)) {
            $dissertationQuery->whereYear('created_at', '<=', $yearTo);
        }
        
        $dissertations = $dissertationQuery->select('id', 'title', 'author', 'department', 'abstract', 'keywords', 'view_count', 'download_count', 'created_at')
            ->selectRaw("'dissertation' as type")
            ->limit(20)
            ->get();
            
        // Merge and sort results
        $combined = $research->concat($dissertations)
            ->sortByDesc('created_at')
            ->values()
            ->all();
            
        return response()->json($combined);
    }
}