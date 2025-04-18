<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publication; // Make sure to use your actual model name

class WelcomeController extends Controller
{
    public function index()
    {
        // Get published research papers
        $publications = Publication::where('is_published', true)
            ->orderBy('published_date', 'desc')
            ->limit(10) // You can adjust this limit
            ->get();

        return view('welcome', compact('publications'));
    }
}