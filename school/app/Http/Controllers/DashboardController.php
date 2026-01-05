<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;   // যদি Student মডেল থাকে
use App\Models\Teachers;
use App\Models\Employee; // যদি Employees মডেল থাকে


class DashboardController extends Controller
{
    public function admin()
    {
        $totalStudents = Student::count();
        $totalTeachers = Teachers::count();
        $totalEmployees = Employee::count();

        return view('admin.dashboard', compact('totalStudents', 'totalTeachers', 'totalEmployees'));
    }

    public function student()
    {


        
        return view('student.dashboard');
    }

    public function teacher()
    {
        return view('teacher.dashboard');
    }
}
