<?php

use App\Exceptions\TaskException;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\mediaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DiController;

Route::redirect('/', '/login');
Route::get('he', [DiController::class, 'index']);

Route::view('/dashboard', 'dashboard')
->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/task-task', function () {
    throw new TaskException('This is a custom task exception message.');
});

Route::resource('clients', ClientController::class)->middleware(['auth', 'verified']);
Route::resource('users', UserController::class)->middleware('role:admin');
Route::resource('projects', ProjectController::class);
Route::resource('tasks', TaskController::class)->middleware(['auth', 'verified', 'ReplaceText']);

Route::group(['prefix' => 'media', 'as' => 'media.'], function () {
    Route::post('{model}/{id}/upload', [MediaController::class, 'store'])->name('upload');
    Route::get('{mediaItem}/download', [MediaController::class, 'download'])->name('download');
    Route::delete('{model}/{id}/{mediaItem}/delete', [MediaController::class, 'destroy'])->name('delete');
});


require __DIR__ . '/auth.php';
// require __DIR__ . '/facadeTry.php';
