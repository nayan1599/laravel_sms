<?php

namespace App\Http\Controllers;

use App\Models\LeaveApplication;
use App\Models\Teachers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LeaveApplicationController extends Controller
{

    public function userlist()
    {
        $user = Auth::user();
        $teacher = Teachers::all();
        $leaves = LeaveApplication::where('student_id', $user->student->id)->latest()->get();
        return view('student.userlist', compact('leaves','teacher'));
    }

    public function create()
    {
              $teacher = Teachers::all();
        return view('student.create',compact('teacher'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'from_date' => 'required|date',
            'to_date'   => 'required|date|after_or_equal:from_date',
            'reason'    => 'required',
            'teacher_id'=> 'required',
        ]);
        $user = Auth::user();
        $class_id = $user->student->class_id;
        LeaveApplication::create([
            'student_id' => $user->student->id,
            'from_date'  => $request->from_date,
            'to_date'    => $request->to_date,
            'reason'     => $request->reason,
            'class_id'   => $class_id,
            'teacher_id' => $request->teacher_id,
            'status'     => 'Pending',
        ]);

        return redirect()->route('student.userlist')->with('success', 'Leave Application Submitted');
    }



     // Admin - All leave list
    public function index()
    {
        $leaves = LeaveApplication::latest()->get();
        return view('leave.index', compact('leaves'));
    }

    // Admin - View leave
    public function show($id)
    {
        $leave = LeaveApplication::findOrFail($id);
        return view('leave.show', compact('leave'));
    }

    // Admin - Edit leave
    public function edit($id)
    {
        $leave = LeaveApplication::findOrFail($id);
        return view('leave.edit', compact('leave'));
    }

    // ✅ Admin - Update leave (FIXED)
    public function update(Request $request, $id)
    {
        $request->validate([
            'from_date' => 'required|date',
            'to_date'   => 'required|date|after_or_equal:from_date',
            'reason'    => 'required|string',
        ]);

        $leave = LeaveApplication::findOrFail($id);

        $leave->update([
            'from_date' => $request->from_date,
            'to_date'   => $request->to_date,
            'reason'    => $request->reason,
            'status'    => 'approved', // lowercase recommended
        ]);

        return redirect()
            ->route('leave.index')
            ->with('success', 'Leave Application Updated Successfully');
    }
}
