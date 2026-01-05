<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
 


use Symfony\Component\Routing\Router;
use App\Http\Controllers\{
    DashboardController,
    StudentController,
    TeachersController,
    GuardianController,
    ClassController,
    SectionController,
    SubjectController,
    AttendanceController,
    ExamController,
    MarkController,
    FeeController,
    ProfileController,
    EmployeeController,
    DepartmentController,
    TeacherAttendanceController,
    FeeTypeController,
    BloodGroupController,
    NoticeController,
    SchoolCommitteeController,
    MenuController,
    OrganizationSettingController,
    BannerController,
    CategoryController,
    PostController,
    StudentApplicationController,
    CertificateController,
    UserController,
    StudentDashboardController,
};
 
 
// role based dashboard routes

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard',[DashboardController::class, 'index']) ->name('admin.dashboard');
});



Route::middleware(['auth', 'role:student'])->group(function () {
    Route::get('/student/dashboard', [StudentDashboardController::class, 'index']) ->name('student.dashboard');
    Route::get('/student/fee', [StudentDashboardController::class, 'fee']) ->name('student.fee');
    Route::get('/student/results', [StudentDashboardController::class, 'results']) ->name('student.results');
});


Route::middleware(['auth', 'role:teacher'])->group(function () {
    Route::get('/teacher/dashboard', fn () => view('teacher.dashboard')) ->name('teacher.dashboard');
});


/*
| Public / Frontend Routes
|--------------------------------------------------------------------------
*/

Route::get('/', fn() => view('index'))->name('home');

Route::prefix('frontend')->group(function () {
    Route::get('posts/{slug}', [PostController::class, 'show'])->name('frontend.posts.show');
    Route::get('categories/{slug}', [CategoryController::class, 'show'])->name('frontend.categories.show');
    Route::get('notices/{id}', [NoticeController::class, 'show'])->name('frontend.notices.show');
    Route::get('committees/{id}', [SchoolCommitteeController::class, 'show'])->name('frontend.committees.show');
});

Route::get('/apply', [StudentApplicationController::class, 'create'])->name('apply');
Route::post('/apply', [StudentApplicationController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Profile
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('destroy');
    });

    /*
    |------------------------------------------------------------------
    | Academic Management
    |------------------------------------------------------------------
    */

    Route::resources([
        'students'       => StudentController::class,
        'teachers'       => TeachersController::class,
        'guardians'      => GuardianController::class,
        'classes'        => ClassController::class,
        'sections'       => SectionController::class,
        'subjects'       => SubjectController::class,
        'departments'    => DepartmentController::class,
        'employees'      => EmployeeController::class,
        'blood-groups'   => BloodGroupController::class,
        'fee-types'      => FeeTypeController::class,
        'fees'           => FeeController::class,
        'exams'          => ExamController::class,
        'marks'          => MarkController::class,
        'attendance'     => AttendanceController::class,
        'teacherattendance' => TeacherAttendanceController::class,
        'notices'        => NoticeController::class,
        'committees'     => SchoolCommitteeController::class,
        'menus'          => MenuController::class,
        'organization_settings' => OrganizationSettingController::class,
        'banners'        => BannerController::class,
        'categories'     => CategoryController::class,
        'posts'          => PostController::class,
        'student_applications' => StudentApplicationController::class,
        'certificates'   => CertificateController::class,
        'users'          => UserController::class,
        'students'       => StudentController::class,
    ]);

    /*Route::resource('users', UserController::class);
    |------------------------------------------------------------------
    | Custom / Report Routes
    |------------------------------------------------------------------
    */


    // Fee Invoice Route    
    Route::get('invoice/{id}', [FeeController::class, 'invoice'])->name('fees.invoice');




    Route::prefix('attendance')->name('attendance.')->group(function () {
        Route::get('get-students', [AttendanceController::class, 'getStudents'])->name('getStudents');
        Route::get('report', [AttendanceController::class, 'report'])->name('report');
        Route::get('monthly', [AttendanceController::class, 'dateRangeReport'])->name('monthly');
    });

    Route::prefix('marksheet')->name('marksheet.')->group(function () {
        Route::get('/', [MarkController::class, 'marksheetForm'])->name('index');
        Route::post('/view', [MarkController::class, 'viewMarksheet'])->name('view');
    });

    Route::get('applications', [StudentApplicationController::class, 'index'])->name('applications.index');
    Route::get('applications/{id}', [StudentApplicationController::class, 'show'])->name('applications.show');
    Route::get('applications/{id}/edit', [StudentApplicationController::class, 'edit'])->name('applications.edit');
    Route::put('applications/{id}', [StudentApplicationController::class, 'update'])->name('applications.update');
    Route::post('applications/{id}/approve', [StudentApplicationController::class, 'approve'])->name('applications.approve');
    Route::post('applications/{id}/reject', [StudentApplicationController::class, 'reject'])->name('applications.reject');
    Route::delete('applications/{id}', [StudentApplicationController::class, 'destroy'])->name('applications.destroy');
});









/*
|--------------------------------------------------------------------------
| Auth Routes (Laravel Breeze / UI)
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';
