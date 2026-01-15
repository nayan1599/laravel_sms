<?php

namespace App\Http\Controllers;


use App\Models\Student;
use App\Models\ClassModel;
// fee model use
use App\Models\Fee;
// FeeType model use
use App\Models\FeeType;

// attendance
use App\Models\Attendance;
// exam model use
use App\Models\Exam;
// mark model use
use App\Models\LeaveApplication;
use Carbon\Carbon;
use App\Models\Mark;
use Illuminate\Support\Facades\Auth;




class StudentDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
         $fees = Fee::orderBy('created_at', 'desc')->where('student_id', $user->student->id)->take(10)->get(); // fee table data get
        // class name show student dashboard
        $classModel = ClassModel::where('id', $user->student->class_id)->first();
        $student = Student::where('user_id', $user->id)->first(); // student table data get
        return view('student.dashboard', compact('student', 'classModel', 'fees'));
    }

    public function fee()
    {
        $user = Auth::user();
        $student = Student::where('user_id', $user->id)->first(); // student table data get
        $fees = Fee::where('student_id', $user->student->id)->get(); // fee table data get

        return view('student.fee', compact('fees', 'student'));
    }

    public function attendance()
    {
        $studentId = Auth::user()->student->id;

        $totalDays = Attendance::where('student_id', $studentId)->count();
        $presentDays = Attendance::where('student_id', $studentId)
            ->where('status', 'present')->count();
        $absentDays = Attendance::where('student_id', $studentId)
            ->where('status', 'absent')->count();

        $attendancePercentage = $totalDays > 0
            ? round(($presentDays / $totalDays) * 100, 2)
            : 0;

        $todayAttendance = Attendance::where('student_id', $studentId)
            ->whereDate('created_at', Carbon::today())
            ->first();

        $pendingLeaves = LeaveApplication::where('student_id', $studentId)
            ->where('status', 'pending')
            ->count();

        return view('student.attendance', compact(
            'totalDays',
            'presentDays',
            'absentDays',
            'attendancePercentage',
            'todayAttendance',
            'pendingLeaves'
        ));
    }

    public function attendanceview()
    {
        $studentId = Auth::user()->student->id;

        $month = $request->month ?? Carbon::now()->format('Y-m');

        $attendances = Attendance::where('student_id', $studentId)
            ->whereMonth('created_at', Carbon::parse($month)->month)
            ->whereYear('created_at', Carbon::parse($month)->year)
            ->orderBy('created_at', 'asc')
            ->get();

        return view('student.attendanceview', compact('attendances', 'month'));
    }




    public function results()
    {
        $user = Auth::user();
        $student = Student::where('user_id', $user->id)->first();
        $classModel = ClassModel::find($student->class_id);
        $exam = Exam::orderBy('created_at', 'desc')->with('marks')->where('class_id', $student->class_id)->first();
        $results = Mark::orderBy('created_at', 'desc')->with('subject', 'exam')
            ->where('student_id', $student->id)
            ->where('exam_id', $exam->id ?? 0)
            ->get();

        $average = $results->avg('marks_obtained');
        $passMarks = 33;
        $passed = $results->where('marks_obtained', '<', $passMarks)->count() === $results->count();

        return view('student.results', compact('student', 'classModel', 'results', 'average', 'passed', 'passMarks', 'exam'));
    }
}
