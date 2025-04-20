<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SearchController;


Route::middleware('auth:sanctum')->get('/user-research', function (Request $request) {
    return $request->user()->research()->select('id', 'project_name')
        ->orderBy('created_at', 'desc')
        ->get();
});
