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
        $attendances = Attendance::with(['student', 'class', 'section', 'subject'])->orderBy('attendance_date', 'desc')->paginate(10);
        return view('attendances.index', compact('attendances'));
    }

    public function create()
    {
        return view('attendances.create', [
            'students' => Student::all(),
            'classes' => ClassModel::all(),
            'sections' => Section::all(),
            // 'subjects' => Subject::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|integer',
            'class_id' => 'required|integer',
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

        return redirect()->route('attendances.index')->with('success', 'Attendance recorded successfully.');
    }

    public function edit($id)
    {
        $attendance = Attendance::findOrFail($id);
        return view('attendances.edit', [
            'attendance' => $attendance,
            'students' => Student::all(),
            'classes' => ClassModel::all(),
            'sections' => Section::all(),
            // 'subjects' => Subject::all(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $attendance = Attendance::findOrFail($id);

        $request->validate([
            'student_id' => 'required|integer',
            'class_id' => 'required|integer',
            'attendance_date' => 'required|date',
            'status' => 'required|in:present,absent,late,leave',
        ]);

        $attendance->update([
            'student_id' => $request->student_id,
            'class_id' => $request->class_id,
            'section_id' => $request->section_id,
            'subject_id' => $request->subject_id,
            'attendance_date' => $request->attendance_date,
            'status' => $request->status,
            'remarks' => $request->remarks,
        ]);

        return redirect()->route('attendances.index')->with('success', 'Attendance updated.');
    }

    public function destroy($id)
    {
        Attendance::destroy($id);
        return back()->with('success', 'Attendance deleted.');
    }
}
