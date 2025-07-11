<?php
namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Student;
use App\Models\ClassModel;
use App\Models\Section;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendance = Attendance::with(['student', 'class', 'section', 'subject'])->latest()->paginate(20);
        return view('attendance.index', compact('attendance'));
    }

    public function create()
    {
        $students = Student::all();
        $classes = ClassModel::all();
        $sections = Section::all();
        $subjects = Subject::all();
        return view('attendance.create', compact('students', 'classes', 'sections', 'subjects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'class_id' => 'required|exists:classes,id',
            'attendance_date' => 'required|date',
            'status' => 'required|in:present,absent,late,leave',
        ]);

        Attendance::create([
            'student_id' => $request->student_id,
            'class_id' => $request->class_id,
            'section_id' => $request->section_id,
            'subject_id' => $request->subject_id,
            'attendance_date' => $request->attendance_date,
            'status' => $request->status,
            'remarks' => $request->remarks,
            'recorded_by' => Auth::id(),
            'recorded_at' => now(),
        ]);

        return redirect()->route('attendance.index')->with('success', 'Attendance recorded successfully.');
    }
}
