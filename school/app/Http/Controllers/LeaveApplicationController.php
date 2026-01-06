<?php

namespace App\Http\Controllers;

use App\Models\LeaveApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
 

class LeaveApplicationController extends Controller
{

    public function index()
    {
            
        $user = Auth::user();
        
        $leaves = LeaveApplication::where('student_id', $user->student->id)->latest()->get();
        return view('student.index', compact('leaves'));
    }

    public function create()
    {
        return view('student.create');
    }

    public function store(Request $request)
    {
    
        $request->validate([
            'from_date' => 'required|date',
            'to_date'   => 'required|date|after_or_equal:from_date',
            'reason'    => 'required',
        ]);

     $user = Auth::user();
        $class_id = $user->student->class_id;

        LeaveApplication::create([
            
            'student_id' => $user->student->id,
            'from_date'  => $request->from_date,
            'to_date'    => $request->to_date,
            'reason'     => $request->reason,
            'class_id'   => $class_id,
            'status'     => 'Pending',
        ]);

        return redirect()->route('student.index')->with('success', 'Leave Application Submitted');
    }
}
