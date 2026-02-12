<?php

use App\Models\Student;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
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
    LeaveApplicationController,
    TeacherDashboardController,
    AccountController,
    AccountCategoryController,
    SalaryController,
    TagController,
    TagTypeController,
    PeriodController,
};
use Symfony\Component\Routing\Router;

/*
|--------------------------------------------------------------------------
| User Role / Backend Routes
|--------------------------------------------------------------------------
*/
/*
================================================
                Admin role
================================================
*/


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
// posts section 
Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('posts', [PostController::class, 'store'])->name('posts.store');
Route::put('posts/{post}', [PostController::class, 'update'])->name('posts.update');
Route::delete('posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
// category section 
Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

/*
================================================
                Student role
================================================
*/

Route::middleware(['auth', 'role:student'])->group(function () {
    Route::get('/student/dashboard', [StudentDashboardController::class, 'index'])->name('student.dashboard');
    Route::get('/student/fee', [StudentDashboardController::class, 'fee'])->name('student.fee');
    Route::get('/student/results', [StudentDashboardController::class, 'results'])->name('student.results');
    Route::get('/student/userlist', [LeaveApplicationController::class, 'userlist'])->name('student.userlist');
    Route::get('/student/create', [LeaveApplicationController::class, 'create'])->name('student.create');
    Route::post('/student/store', [LeaveApplicationController::class, 'store'])->name('student.store');
    Route::get('/student/attendance', [StudentDashboardController::class, 'attendance'])->name('student.attendance');
    Route::get('/student/attendanceview', [StudentDashboardController::class, 'attendanceview'])->name('student.attendanceview');
});
/*
================================================
                Tacher role
================================================
*/
Route::middleware(['auth', 'role:teacher'])->group(function () {
    Route::get('/teacher/dashboard', [TeacherDashboardController::class, 'index'])->name('teacher.dashboard');
    Route::get('/teacher/classes', [TeacherDashboardController::class, 'classlist'])->name('teacher.classlist');
    Route::get('/teacher/studentlist', [TeacherDashboardController::class, 'studentlist'])->name('teacher.studentlist');



    Route::prefix('leave')->name('leave.')->group(function () {
        Route::get('index', [LeaveApplicationController::class, 'index'])->name('index');
        Route::get('show/{id}', [LeaveApplicationController::class, 'show'])->name('show');
        Route::get('edit/{id}', [LeaveApplicationController::class, 'edit'])->name('edit');
        Route::put('edit/{id}', [LeaveApplicationController::class, 'update'])->name('leave.update');
    });
});











/*
|--------------------------------------------------------------------------
| User Role / Backend End
|--------------------------------------------------------------------------
*/


/*
|--------------------------------------------------------------------------
| Public / Frontend Routes
|--------------------------------------------------------------------------
*/

Route::get('/', fn() => view('index'))->name('home');
Route::get('posts/{slug}', [PostController::class, 'show'])->name('frontend.posts.show');
Route::get('categories/{slug}', [CategoryController::class, 'show'])->name('frontend.categories.show');
Route::get('notices/{id}', [NoticeController::class, 'show'])->name('frontend.notices.show');
Route::get('committees/{id}', [SchoolCommitteeController::class, 'show'])->name('frontend.committees.show');
// online apply 
Route::get('/apply', [StudentApplicationController::class, 'create'])->name('apply');
Route::post('/apply', [StudentApplicationController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');



















/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->group(function () {



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
        'leave'         => LeaveApplicationController::class,
        'accounts'      => AccountController::class,
        'salaries'        => SalaryController::class,
        'tags' => TagController::class,
        'types' => TagTypeController::class,
        'periods' =>  PeriodController::class,

    ]);

    /*Route::resource('users', UserController::class);
    |------------------------------------------------------------------
    | Custom / Report Routes
    |------------------------------------------------------------------
    */

    // Other 


    Route::get('/students/class/{id}/{name}', [StudentController::class, 'studentsByClass']);
    Route::get('fees/{feeType}/{class}', [FeeController::class, 'details'])->name('fees.details');
    Route::get('account-categories', [AccountCategoryController::class, 'index'])
        ->name('account-categories.index');
    Route::get('account-categories/create', [AccountCategoryController::class, 'create'])->name('account-categories.create');
    Route::post('account-categories', [AccountCategoryController::class, 'store'])->name('account-categories.store');
    Route::get('account-categories/{id}/edit', [AccountCategoryController::class, 'edit'])->name('account-categories.edit');
    Route::put('account-categories/{id}', [AccountCategoryController::class, 'update'])->name('account-categories.update');
    Route::delete('account-categories/{id}', [AccountCategoryController::class, 'destroy'])->name('account-categories.destroy');

    // other end 




    // Leave Application Routes
    Route::prefix('leave')->name('leave.')->group(function () {
        Route::get('index', [LeaveApplicationController::class, 'index'])->name('index');
        Route::get('show/{id}', [LeaveApplicationController::class, 'show'])->name('show');
        Route::get('edit/{id}', [LeaveApplicationController::class, 'edit'])->name('edit');
        Route::put('edit/{id}', [LeaveApplicationController::class, 'update'])->name('leave.update');
    });
    // Profile
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('destroy');
    });
    // attendance

    Route::get('attendance/by-class-section/{class}/{section}', function ($class, $section) {
        return Student::where('class_id', $class)
            ->where('section_id', $section)
            ->orderBy('name')
            ->get(['id', 'name']);
    });

    Route::prefix('attendance')->name('attendance.')->group(function () {




        Route::get('report', [AttendanceController::class, 'report'])->name('report');
        Route::get('monthly', [AttendanceController::class, 'dateRangeReport'])->name('monthly');
    });
    // marksheet
    Route::prefix('marksheet')->name('marksheet.')->group(function () {
        Route::get('/', [MarkController::class, 'marksheetForm'])->name('index');
        Route::post('/view', [MarkController::class, 'viewMarksheet'])->name('view');
    });

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('invoice/{id}', [FeeController::class, 'invoice'])->name('fees.invoice');
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
