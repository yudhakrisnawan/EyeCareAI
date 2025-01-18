<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\ClassificationController;

Route::get('/', function () {
    return view('home');
});

Route::post('/upload', function (Request $request) {
    try {
        // Handle file upload
        $image = $request->file('image');

        // Make POST request to Flask API
        $response = Http::attach(
            'image',
            file_get_contents($image->getRealPath()),
            $image->getClientOriginalName()
        )->post('http://127.0.0.1:5000/predict');

        // Handle Flask API response
        if ($response->successful()) {
            return view('result', ['result' => $response->json()]);
        } else {
            return back()->with('error', 'Error processing the image. Please try again.');
        }
    } catch (\Exception $e) {
        return back()->with('error', 'An error occurred: ' . $e->getMessage());
    }
});

