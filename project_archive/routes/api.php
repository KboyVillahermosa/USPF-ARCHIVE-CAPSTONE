<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SearchController;

Route::middleware('api')->group(function () {
    Route::get('/search', [SearchController::class, 'search']);
});