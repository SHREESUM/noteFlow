<?php

use App\Http\Controllers\NoteController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [PageController::class, 'sendContact'])->name('contact.send');

Route::get('/notes/share/{token}', [NoteController::class, 'publicShow'])
    ->name('notes.public.show');

// Authenticated routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [NoteController::class, 'index'])
        ->name('dashboard');

    Route::post('/notes', [NoteController::class, 'store'])
        ->name('notes.store');

    Route::get('/notes/{note}/edit', [NoteController::class, 'edit'])
        ->name('notes.edit');

    Route::patch('/notes/{note}', [NoteController::class, 'update'])
        ->name('notes.update');

    Route::patch('/notes/{note}/publish', [NoteController::class, 'publish'])
        ->name('notes.publish');

    Route::delete('/notes/{note}', [NoteController::class, 'destroy'])
        ->name('notes.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::view('settings/profile', 'settings.profile')->name('settings.profile');
    Route::view('settings/password', 'settings.password')->name('settings.password');
    Route::view('settings/appearance', 'settings.appearance')->name('settings.appearance');
});
require __DIR__.'/auth.php';