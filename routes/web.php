<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ContactController;

// Main pages
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tentang', function () {
    return view('about');
})->name('about');
Route::get('/kegiatan', [ActivityController::class, 'index'])->name('activities');
Route::get('/berita', [NewsController::class, 'index'])->name('news');
Route::get('/kontak', [ContactController::class, 'index'])->name('contact');

// API routes for AJAX calls
Route::prefix('api')->group(function () {
    // Home page data
    Route::get('/latest-content', [HomeController::class, 'getLatestContent']);

    // News (spesifik dulu → dinamis belakangan)
    Route::get('/news/latest', [NewsController::class, 'latest'])->name('api.news.latest');
    Route::get('/news', [NewsController::class, 'getNews']);
    Route::get('/news/{slug}', [NewsController::class, 'show']);

    // Activities (spesifik dulu → dinamis belakangan)
    Route::get('/activities/latest', [ActivityController::class, 'latest'])->name('api.activities.latest');
    Route::get('/activities', [ActivityController::class, 'getActivities']);
    Route::get('/activities/{slug}', [ActivityController::class, 'show']);

    // Contact
    Route::post('/contact', [ContactController::class, 'submit']);
});
