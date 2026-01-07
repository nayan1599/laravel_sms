<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\ClassModel;
// fee model use
use App\Models\Fee;
// FeeType model use
use App\Models\FeeType;
// exam model use
use App\Models\Exam;
// mark model use
use App\Models\Mark;
use Illuminate\Support\Facades\Auth;

class StudentDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $feetype = FeeType::where('class_id', $user->student->class_id)->get(); // fee type table data get
        $fees = Fee::orderBy('created_at', 'desc')->where('student_id', $user->student->id)->take(10)->get(); // fee table data get
        // class name show student dashboard
        $classModel = ClassModel::where('id', $user->student->class_id)->first();
        $student = Student::where('user_id', $user->id)->first(); // student table data get

        return view('student.dashboard', compact('student', 'classModel', 'fees', 'feetype'));
    }

    public function fee()
    {
        $user = Auth::user();
        $student = Student::where('user_id', $user->id)->first(); // student table data get
        $fees = Fee::where('student_id', $user->student->id)->get(); // fee table data get

        return view('student.fee', compact('fees', 'student'));
    }
    public function results()
    {
        $user = Auth::user();
        $student = Student::where('user_id', $user->id)->first();
        $classModel = ClassModel::find($student->class_id);
        $exam = Exam::orderBy('created_at', 'desc')->with('marks')->where('class_id', $student->class_id)->first();
        $results = Mark::orderBy('created_at', 'desc')->with('subject','exam')
        ->where('student_id', $student->id)
        ->where('exam_id', $exam->id ?? 0)
        ->get();
        
        $average = $results->avg('marks_obtained');
        $passMarks = 33;
        $passed = $results->where('marks_obtained', '<', $passMarks)->count() === $results->count();

        return view('student.results', compact('student', 'classModel', 'results', 'average', 'passed', 'passMarks', 'exam'));
    }

    
}
