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
{ public function index()
    {
        $attendance = Attendance::with(['student', 'class', 'section', 'subject'])
                        ->latest()
                        ->paginate(20);

        return view('attendance.index', compact('attendance'));
    }

    public function create()
    {
        $classes = ClassModel::all();
        $sections = Section::all();
        $subjects = Subject::all();
        return view('attendance.create', compact('classes', 'sections', 'subjects'));
    }

    public function getStudents(Request $request)
    {
        $students = Student::where('class_id', $request->class_id)
                    ->where('section_id', $request->section_id)
                    ->get(['id', 'name']);

        return response()->json($students);
    }

    public function store(Request $request)
    {
        $request->validate([
            'class_id' => 'required|exists:classes,id',
            'section_id' => 'required|exists:sections,id',
            'subject_id' => 'required|exists:subjects,id',
            'date' => 'required|date',
            'present_students' => 'nullable|array',
        ]);

        $allStudents = Student::where('class_id', $request->class_id)
                            ->where('section_id', $request->section_id)
                            ->get();

        foreach ($allStudents as $student) {
            $status = in_array($student->id, $request->present_students ?? []) ? 'present' : 'absent';

            Attendance::updateOrCreate(
                [
                    'student_id' => $student->id,
                    'attendance_date' => $request->date,
                    'subject_id' => $request->subject_id, // <-- Added
                ],
                [
                    'class_id' => $request->class_id,
                    'section_id' => $request->section_id,
                    'status' => $status,
                    'recorded_by' => Auth::id(),
                    'recorded_at' => now(),
                ]
            );
        }

        return redirect()->route('attendance.index')->with('success', 'Attendance saved successfully.');
    }
}
