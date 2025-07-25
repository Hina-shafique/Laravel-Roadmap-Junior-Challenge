<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('clients', ClientController::class)->middleware(['auth', 'verified']);
Route::resource('users', UserController::class)->middleware(['auth', 'verified']);
Route::resource('projects', ProjectController::class)->middleware(['auth', 'verified']);
Route::resource('tasks', TaskController::class)->middleware(['auth', 'verified']);

require __DIR__.'/auth.php';
