<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShortenedUrlController;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/test-generate-short-code', [ShortenedUrlController::class, 'testGenerateShortCode']);
