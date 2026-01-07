<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teachers;
use App\Models\Fee;
use App\Models\Attendance;
use App\Models\LeaveApplication;
use App\Models\ClassModel;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Summary
        $totalStudents  = Student::count();
        $totalTeachers  = Teachers::count();
        $totalClasses   = ClassModel::count();
        $pendingFees    = Fee::where('payment_status', 'pending')->sum('amount');

        // Monthly Students (Last 6 months)
        $months = collect(range(5, 0))->map(function ($i) {
            return Carbon::now()->subMonths($i)->format('M');
        });

        $studentCounts = collect(range(5, 0))->map(function ($i) {
            return Student::whereMonth('created_at', Carbon::now()->subMonths($i)->month)
                ->count();
        });

        // Attendance summary
        $attendanceData = [
            Attendance::where('status', 'present')->count(),
            Attendance::where('status', 'absent')->count(),
        ];

        return view('dashboard', compact(
            'totalStudents',
            'totalTeachers',
            'totalClasses',
            'pendingFees',
            'months',
            'studentCounts',
            'attendanceData'
        ));
    }
}