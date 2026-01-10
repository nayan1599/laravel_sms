<?php

namespace App\Http\Controllers;

use App\Models\LeaveApplication;
use App\Models\Teachers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class LeaveApplicationController extends Controller
{

    public function userlist()
    {

        $user = Auth::user();
        $teacher = Teachers::all();
        $leaves = LeaveApplication::where('student_id', $user->student->id)->latest()->get();
        return view('student.userlist', compact('leaves', 'teacher'));
    }

    public function create()
    {
        $teacher = Teachers::all();
        return view('student.create', compact('teacher'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'leave_type' => 'required|string',
            'reason'     => 'required|string',
            'start_date' => 'required|date',
            'end_date'   => 'required|date|after_or_equal:start_date',
        ]);

        $totalDays = Carbon::parse($request->start_date)
            ->diffInDays(Carbon::parse($request->end_date)) + 1;
        $user = Auth::user();
        LeaveApplication::create([
            'student_id' => $user->student->id,
            'leave_type' => $request->leave_type,
            'reason'     => $request->reason,
            'start_date' => $request->start_date,
            'end_date'   => $request->end_date,
            'total_days' => $totalDays,
            'status'     => 'pending',
            'applied_at' => now(),
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
            'status' => 'required|in:approved,rejected',
            'teacher_remark' => 'nullable|string'
        ]);

        $leave = LeaveApplication::findOrFail($id);
        $user = Auth::user();
        $leave->update([
            'teacher_id' => $user->teacher->id,
            'status' => $request->status,
            'teacher_remark' => $request->teacher_remark,
            'approved_at' => now(),
        ]);

        return redirect()
            ->route('leave.index')
            ->with('success', 'Leave Application Updated Successfully');
    }
}
