<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeachersController;
use App\Http\Controllers\GuardianController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\SectionController;

Route::resource('sections', SectionController::class);
Route::resource('students', StudentController::class);
Route::resource('teachers', TeachersController::class);
Route::resource('guardians', GuardianController::class);
Route::resource('classes', ClassController::class);
Route::post('/students/{student}/attach-guardian', [StudentController::class, 'attachGuardian'])->name('students.attachGuardian');









Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
