<?php

namespace App\Http\Controllers;

use App\Models\Teachers;
use App\Models\TeacherAttendance;
use Illuminate\Http\Request;

class TeacherAttendanceController extends Controller
{
    // Attendance list with pagination and date filter
    public function index(Request $request)
    {
        $date = $request->get('created_at', date('Y-m-d'));

        $attendances = TeacherAttendance::with('teacher')
            ->where('created_at', $date)
            ->orderBy('teacher_id')
            ->paginate(10)
            ->appends(['created_at' => $date]);

        return view('teacherattendance.index', compact('attendances', 'date'));
    }

    // Show form to create attendance (new date)
    public function create()
    {
        $teachers = Teachers::all();
        return view('teacherattendance.create', compact('teachers'));
    }

    // Store attendance (new or update)
    public function store(Request $request)
    {
        $request->validate([
            'created_at' => 'required|created_at',
            'attendances' => 'required|array',
        ]);

        foreach ($request->attendances as $teacher_id => $status) {
            TeacherAttendance::updateOrCreate(
                ['teacher_id' => $teacher_id, 'created_at' => $request->date],
                ['status' => $status]
            );
        }

        return redirect()->route('teacherattendance.index', ['date' => $request->date])
                         ->with('success', 'Attendance saved successfully!');
    }

    // Show specific attendance record
    public function show($id)
    {
        $attendance = TeacherAttendance::with('teacher')->findOrFail($id);
        return view('teacherattendance.show', compact('attendance'));
    }

    // Edit attendance for a specific record
    public function edit($id)
    {
        $attendance = TeacherAttendance::findOrFail($id);
        $teachers = Teachers::all();
        return view('teacherattendance.edit', compact('attendance', 'teachers'));
    }

    // Update attendance record
    public function update(Request $request, $id)
    {
        $request->validate([
            'date' => 'required|date',
            'teacher_id' => 'required|exists:teachers,id',
            'status' => 'required|in:present,absent,late',
        ]);

        $attendance = TeacherAttendance::findOrFail($id);
        $attendance->update($request->only(['date', 'teacher_id', 'status']));

        return redirect()->route('teacherattendance.index', ['date' => $request->date])
                         ->with('success', 'Attendance updated successfully!');
    }

    // Delete attendance record
    public function destroy($id)
    {
        $attendance = TeacherAttendance::findOrFail($id);
        $attendance->delete();

        return redirect()->back()->with('success', 'Attendance deleted successfully!');
    }
}
