<?php
namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Attendance;
use App\Models\Student;
use App\Models\ClassModel;
use App\Models\Section;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{ public function index(Request $request)
{
    $query = Attendance::with(['student', 'class', 'section', 'subject', 'recordedBy']);

    if ($request->filled('date')) {
        $query->where('attendance_date', $request->date);
    }

    if ($request->filled('student_name')) {
        $query->whereHas('student', function ($q) use ($request) {
            $q->where('name', 'like', '%'.$request->student_name.'%');
        });
    }

    if ($request->filled('class_id')) {
        $query->where('class_id', $request->class_id);
    }

    $attendance = $query->latest()->paginate(20)->withQueryString();

    $classes = ClassModel::all();

    return view('attendance.index', compact('attendance', 'classes'));
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
public function destroy($id)
{
    $attendance = Attendance::findOrFail($id);
    $attendance->delete();

    return redirect()->route('attendance.index')->with('success', 'Attendance entry deleted successfully.');
}

public function report(Request $request)
{
    $classes = ClassModel::all();
    $sections = Section::all();
    $subjects = Subject::all();
    $attendances = collect(); // empty collection by default

    $total = $present = $absent = 0;

    if ($request->filled(['class_id', 'section_id', 'subject_id', 'date'])) {
        $attendances = Attendance::with('student')
            ->where('class_id', $request->class_id)
            ->where('section_id', $request->section_id)
            ->where('subject_id', $request->subject_id)
            ->where('attendance_date', $request->date)
            ->get();

        $total = $attendances->count();
        $present = $attendances->where('status', 'present')->count();
        $absent = $attendances->where('status', 'absent')->count();
    }

    return view('attendance.report', compact(
        'classes', 'sections', 'subjects',
        'attendances', 'total', 'present', 'absent'
    ));
}

public function dateRangeReport(Request $request)
{
    $classes = ClassModel::all();
    $sections = Section::all();
    $report = collect();

    $start = $request->input('start_date');
    $end = $request->input('end_date');
    $classId = $request->input('class_id');
    $sectionId = $request->input('section_id');

    if ($start && $end && $classId && $sectionId) {
        $students = Student::where('class_id', $classId)
                           ->where('section_id', $sectionId)
                           ->get();

        foreach ($students as $student) {
            $total = Attendance::where('student_id', $student->id)
                        ->whereBetween('attendance_date', [$start, $end])
                        ->count();

            $present = Attendance::where('student_id', $student->id)
                        ->where('status', 'present')
                        ->whereBetween('attendance_date', [$start, $end])
                        ->count();

            $absent = $total - $present;

            $report->push([
                'name' => $student->name,
                'present' => $present,
                'absent' => $absent,
                'total' => $total,
            ]);
        }
    }

    return view('attendance.monthly', compact('classes', 'sections', 'report', 'start', 'end', 'classId', 'sectionId'));
}
    
}
