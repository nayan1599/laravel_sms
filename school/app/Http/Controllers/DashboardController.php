<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;   // যদি Student মডেল থাকে
use App\Models\Teachers;
use App\Models\Employee; // যদি Employees মডেল থাকে

class DashboardController extends Controller
{
    public function index()
    {
        $totalStudents = Student::count();
        $totalTeachers = Teachers::count();
        $totalEmployees = Employee::count();

        return view('dashboard', compact('totalStudents', 'totalTeachers', 'totalEmployees'));
    }
}
