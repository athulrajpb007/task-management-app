<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\Api\ProjectApiController;
use App\Http\Controllers\Api\TaskApiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('tasks/export', [TaskController::class, 'export'])
    ->name('tasks.export');
    
    Route::resource('projects', ProjectController::class);
    Route::resource('tasks', TaskController::class);
});


// API Endpoints

Route::get('/api/projects', [ProjectApiController::class, 'index']);
Route::get('/api/tasks', [TaskApiController::class, 'index']);
Route::get('/api/projects/{id}/tasks', [TaskApiController::class, 'byProject']);
Route::patch('/api/tasks/{id}/status', [TaskApiController::class, 'updateStatus']);