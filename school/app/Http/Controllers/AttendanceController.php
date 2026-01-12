<?php 
namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Student;
use App\Models\ClassModel;
use App\Models\Section;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class AttendanceController extends Controller
{
    // Index - list with date filter
public function index(Request $request)
{
    $date = $request->get('date', date('Y-m-d'));

    // 🔹 Class wise attendance summary
    $classAttendance = DB::table('attendance')
        ->join('classes', 'attendance.class_id', '=', 'classes.id')
        ->where('attendance.attendance_date', $date)
        ->select(
            'classes.id as class_id',
            'classes.class_name',
            DB::raw('COUNT(attendance.student_id) as total_students'),
            DB::raw("SUM(CASE WHEN attendance.status = 'present' THEN 1 ELSE 0 END) as present_students"),
            DB::raw("SUM(CASE WHEN attendance.status = 'absent' THEN 1 ELSE 0 END) as absent_students")
        )
        ->groupBy('classes.id', 'classes.class_name')
        ->get();

    // 🔹 Attendance list (existing)
    $attendances = Attendance::with(['student', 'class', 'section', 'subject'])
        ->where('attendance_date', $date)
        ->orderBy('class_id')
        ->paginate(10)
        ->appends(['date' => $date]);

    return view('attendance.index', compact(
        'attendances',
        'date',
        'classAttendance'
    ));
}

    // Show form for a whole class
public function create()
{
    $classes  = ClassModel::all();
    $sections = Section::all();
    $subjects = Subject::all();

    return view('attendance.create', compact('classes','sections','subjects'));
}

// Store bulk attendance
public function store(Request $request)
{
    $request->validate([
        'class_id'        => 'required|exists:classes,id',
        'section_id'      => 'required|exists:sections,id',
        'subject_id'      => 'nullable|exists:subjects,id',
        'attendance_date' => 'required|date',
        'statuses'        => 'required|array', // student_id => status
    ]);

    foreach ($request->statuses as $student_id => $status) {
        attendance::updateOrCreate(
            [
                'student_id'      => $student_id,
                'attendance_date' => $request->attendance_date,
                'subject_id'      => $request->subject_id
            ],
            [
                'class_id'        => $request->class_id,
                'section_id'      => $request->section_id,
                'status'          => $status,
                'recorded_by'     => Auth::id(),
                'recorded_at'     => now(),
            ]
        );
    }

    return redirect()->route('attendance.index', ['date'=>$request->attendance_date])
                     ->with('success','Attendance saved successfully!');
}
    // Show
    public function show($id)
    {
        $attendance = Attendance::with(['student','class','section','subject'])->findOrFail($id);
        return view('attendance.show', compact('attendance'));
    }

    // Edit
    public function edit($id)
    {
        $attendance = Attendance::findOrFail($id);
        $students   = Student::orderBy('name')->get();
        $classes    = ClassModel::all();
        $sections   = Section::all();
        $subjects   = Subject::all();

        return view('attendance.edit', compact('attendance','students','classes','sections','subjects'));
    }

    // Update
    public function update(Request $request, $id)
    {
        $request->validate([
            'student_id'      => 'required|exists:students,id',
            'class_id'        => 'required|exists:ClassModel,id',
            'section_id'      => 'nullable|exists:sections,id',
            'subject_id'      => 'nullable|exists:subjects,id',
            'attendance_date' => 'required|date',
            'status'          => 'required|in:present,absent,late,leave',
            'remarks'         => 'nullable|string|max:255',
        ]);

        $attendance = Attendance::findOrFail($id);
        $attendance->update([
            'student_id'      => $request->student_id,
            'class_id'        => $request->class_id,
            'section_id'      => $request->section_id,
            'subject_id'      => $request->subject_id,
            'attendance_date' => $request->attendance_date,
            'status'          => $request->status,
            'remarks'         => $request->remarks,
            'recorded_by'     => Auth::id(),
            'recorded_at'     => now(),
        ]);

        return redirect()->route('attendance.index', ['date'=>$request->attendance_date])
            ->with('success','Attendance updated successfully!');
    }

    // Delete
    public function destroy($id)
    {
        Attendance::findOrFail($id)->delete();
        return redirect()->back()->with('success','Attendance deleted successfully!');
    }
}
