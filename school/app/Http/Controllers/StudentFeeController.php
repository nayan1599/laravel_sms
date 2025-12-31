<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fee;
use App\Models\User;
 


class StudentFeeController extends Controller
{

    public function index(Request $request)
{
    $studentId =$request->user()->student->id;
    $fee = Fee::where('student_id', $studentId)->get();

    return view('student.fees', compact('fee'));
}

}
