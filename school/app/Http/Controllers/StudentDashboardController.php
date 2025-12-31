<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mark;
use App\Models\Fee;
use App\Models\Student;
use App\Models\User;

class StudentDashboardController extends Controller
{
    //
    public function index(Request $request)
{
    $student = $request->user()->student;
    return view('student.dashboard', compact('student'));
}
}
