<?php

namespace App\Http\Controllers;

use App\Models\Teachers;
use App\Models\TeacherAttendance;
use Illuminate\Http\Request;

class TeacherAttendanceController extends Controller
{
    /**
     * Attendance list with date filter
     */
    public function index(Request $request)
    {
        $date = $request->get('date', date('Y-m-d'));

        $attendances = TeacherAttendance::with('teacher')
            ->where('attendance_date', $date)
            ->orderBy('teacher_id')
            ->paginate(10)
            ->appends(['date' => $date]);

        return view('teacherattendance.index', compact('attendances', 'date'));
    }

    /**
     * Show attendance create form
     */
    public function create()
    {
        $teachers = Teachers::orderBy('name')->get();
        return view('teacherattendance.create', compact('teachers'));
    }

    /**
     * Store attendance (bulk insert/update)
     */
    public function store(Request $request)
    {
        $request->validate([
            'attendance_date' => 'required|date',
            'attendances'     => 'required|array',
        ]);

        foreach ($request->attendances as $teacher_id => $status) {
            TeacherAttendance::updateOrCreate(
                [
                    'teacher_id'      => $teacher_id,
                    'attendance_date' => $request->attendance_date,
                ],
                [
                    'status' => $status,
                ]
            );
        }

        return redirect()
            ->route('teacherattendance.index', ['date' => $request->attendance_date])
            ->with('success', 'Teacher attendance saved successfully!');
    }

    /**
     * Show single attendance
     */
    public function show($id)
    {
        $attendance = TeacherAttendance::with('teacher')->findOrFail($id);
        return view('teacherattendance.show', compact('attendance'));
    }

    /**
     * Edit attendance
     */
    public function edit($id)
    {
        $attendance = TeacherAttendance::findOrFail($id);
        $teachers   = Teachers::orderBy('name')->get();

        return view('teacherattendance.edit', compact('attendance', 'teachers'));
    }

    /**
     * Update attendance
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'attendance_date' => 'required|date',
            'teacher_id'      => 'required|exists:teachers,id',
            'status'          => 'required|in:present,absent',
        ]);

        $attendance = TeacherAttendance::findOrFail($id);

        $attendance->update([
            'attendance_date' => $request->attendance_date,
            'teacher_id'      => $request->teacher_id,
            'status'          => $request->status,
        ]);

        return redirect()
            ->route('teacherattendance.index', ['date' => $request->attendance_date])
            ->with('success', 'Attendance updated successfully!');
    }

    /**
     * Delete attendance
     */
    public function destroy($id)
    {
        TeacherAttendance::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Attendance deleted successfully!');
    }
}
