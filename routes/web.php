<?php

use App\Http\Controllers\DashboardController; // Add this import
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResultsController;
use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Course routes
    Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
    Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
    Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');
    Route::get('/courses/{course}', [CourseController::class, 'show'])->name('courses.show');
    Route::get('/courses/{course}/edit', [CourseController::class, 'edit'])->name('courses.edit');
    Route::put('/courses/{course}', [CourseController::class, 'update'])->name('courses.update');
    Route::delete('/courses/{course}', [CourseController::class, 'destroy'])->name('courses.destroy');

    // Result routes
    Route::get('/results/create', [ResultsController::class, 'create'])->name('results.create');
    Route::post('/results', [ResultsController::class, 'store'])->name('results.store');
    Route::get('/results', [ResultsController::class, 'index'])->name('results.index');
    Route::get('/results/{result}', [ResultsController::class, 'show'])->name('results.show');
    Route::get('/results/{result}/edit', [ResultsController::class, 'edit'])->name('results.edit');
    Route::put('/results/{result}', [ResultsController::class, 'update'])->name('results.update');
    Route::delete('/results/{result}', [ResultsController::class, 'destroy'])->name('results.destroy');
});

require __DIR__ . '/auth.php';
