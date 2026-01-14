<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teachers;
use App\Models\Student;
use App\Models\LeaveApplication;
use App\Models\Notice;
use App\Models\Subject;
use App\Models\ClassModel;
use Illuminate\Support\Facades\Auth;

class TeacherDashboardController extends Controller
{
    /**
     * Show Teacher Dashboard
     */
    public function index()
    {
        // ✅ Correct way to get logged-in teacher
        $userId = Auth::id();
        $teacher = Teachers::where('user_id', $userId)->first();
        $teacherId = $teacher->id;
        $totalStudents = Student::count();
        $pendingLeaves = LeaveApplication::where('status', 'pending')->count();
        $totalNotices = Notice::count();
        $totalSubjects = Subject::where('subject_teacher_id', $teacherId)->count();
        $totalClasses = ClassModel::where('class_teacher_id', $teacherId)->count();
        return view('teacher.dashboard', compact(
            'totalStudents',
            'pendingLeaves',
            'totalNotices',
            'totalSubjects',
            'totalClasses'
        ));
    }
public function classlist()
{
   $userId = Auth::id();
    $teacher = Teachers::where('user_id', $userId)->first();    
    $teacherId = $teacher->id;
    $classes = ClassModel::where('class_teacher_id', $teacherId)->get();;
    return view('teacher.my_classes', compact('classes'));
}
 


}
