<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PortalController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/stories/{slug}', [ArticleController::class, 'show'])->name('articles.show');
Route::post('/subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');

Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/chronicles', [PageController::class, 'blog'])->name('blog');

// Client Portal Routes
Route::prefix('portal')->name('portal.')->group(function () {
    Route::get('/', [PortalController::class, 'login'])->name('login');
    Route::post('/auth', [PortalController::class, 'authenticate'])->name('authenticate');
    Route::get('/dashboard', [PortalController::class, 'dashboard'])->name('dashboard');
});