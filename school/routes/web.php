<?php

// use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
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
use App\Http\Controllers\FeeTypeController;
use App\Http\Controllers\BloodGroupController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\SchoolCommitteeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrganizationSettingController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;




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
Route::resource('fee-types', FeeTypeController::class);
Route::resource('blood-groups', BloodGroupController::class);
Route::resource('notices', NoticeController::class);
Route::resource('committees', SchoolCommitteeController::class);
Route::resource('menus', MenuController::class);
Route::resource('organization_settings', OrganizationSettingController::class);
Route::resource('banners', BannerController::class);
Route::resource('categories', CategoryController::class);
Route::resource('posts', PostController::class);

 













Route::get('/get-students', [AttendanceController::class, 'getStudents'])->name('attendance.getStudents');
Route::get('/attendance-report', [App\Http\Controllers\AttendanceController::class, 'report'])->name('attendance.report');
Route::get('/monthly-attendance', [App\Http\Controllers\AttendanceController::class, 'dateRangeReport'])->name('attendance.monthly');
Route::get('/marksheet', [MarkController::class, 'marksheetForm'])->name('marksheet.index');
Route::post('/marksheet/view', [MarkController::class, 'viewMarksheet'])->name('marksheet.view');





 

Route::get('/', function () {
    return view('index');  // তুমি এখানে যেকোনো ভিউ দিতে পারো, যেমন home বা frontend.index
});


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
