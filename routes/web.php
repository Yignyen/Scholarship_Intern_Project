<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return redirect()->route('scholarships.index'); // Redirects to scholarship list
})->middleware(['auth', 'verified'])->name('dashboard');


use App\Http\Controllers\ScholarshipController;
use App\Http\Controllers\StudentScholarshipController;

// Scholarship Routes
Route::get('/scholarships', [ScholarshipController::class, 'index'])
    ->name('scholarships.index');

Route::get('/scholarships/create', [ScholarshipController::class, 'create'])
    ->name('scholarships.create');

Route::post('/scholarships', [ScholarshipController::class, 'store'])
    ->name('scholarships.store');

// Student Application Routes
Route::get('/apply/{id}', [StudentScholarshipController::class, 'apply'])
    ->name('scholarships.apply');

Route::post('/apply', [StudentScholarshipController::class, 'store'])
    ->name('scholarships.apply.store');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
