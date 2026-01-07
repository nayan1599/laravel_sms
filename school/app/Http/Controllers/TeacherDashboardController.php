<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;   // যদি Student মডেল থাকে
use App\Models\Teachers;
use App\Models\LeaveApplication;
use App\Models\Notice;
use App\Models\Subject;
use App\Models\ClassModel; // যদি তোমার class model এই নাম থাকে
use Illuminate\Support\Facades\Auth;

class TeacherDashboardController extends Controller
{


    /**
     * Show Teacher Dashboard
     */
    public function index()
    {

        $teacher = Auth::user();
        $totalStudents = Student::count();
        $pendingLeaves = LeaveApplication::where('status', 'pending')->count();
        $totalNotices = Notice::count();
        $totalSubjects = Subject::where('subject_teacher_id', $teacher->id)->count();
        $totalClasses = ClassModel::count();

        return view('teacher.dashboard', compact(
            'totalStudents',
            'pendingLeaves',
            'totalNotices',
            'totalSubjects',
            'totalClasses'
        ));
    }
}
