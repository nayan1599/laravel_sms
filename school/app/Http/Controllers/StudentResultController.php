<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mark;
use App\Models\User;

class StudentResultController extends Controller
{
    //
  
    public function index(Request $request)
    {
        $studentId = $request->user()->student->id;
        $results = Mark::where('student_id', $studentId)->get();

        return view('student.result', compact('results'));
    }

}
