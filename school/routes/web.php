<?php

// use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

use App\Http\Controllers\DashboardController;

use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeachersController;
use App\Http\Controllers\GuardianController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\MarkController;
use App\Http\Controllers\FeeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\TeacherAttendanceController;




// Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
// Route::get('/', function () {
//     return redirect()->route('dashboard');
// });
 
Route::resource('departments', DepartmentController::class);
Route::resource('teacherattendance', TeacherAttendanceController::class);
Route::resource('fees', FeeController::class);
Route::resource('marks', MarkController::class);
Route::resource('exams', ExamController::class);
Route::resource('subjects', SubjectController::class);
Route::resource('attendance', AttendanceController::class);
Route::resource('sections', SectionController::class);
Route::resource('students', StudentController::class);
Route::resource('teachers', TeachersController::class);
Route::resource('guardians', GuardianController::class);
Route::resource('classes', ClassController::class);
Route::resource('employees', EmployeeController::class);
Route::post('/students/{student}/attach-guardian', [StudentController::class, 'attachGuardian'])->name('students.attachGuardian');








Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
