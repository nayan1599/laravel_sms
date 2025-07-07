<?php

namespace App\Http\Controllers;
 use App\Models\Mark;
use App\Models\Student;
use App\Models\Exam;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MarkController extends Controller
{
    public function index()
    {
        $marks = Mark::with(['student', 'exam', 'subject'])->get();
        return view('marks.index', compact('marks'));
    }

    public function create()
    {
        $students = Student::all();
        $exams = Exam::all();
        $subjects = Subject::all();
        return view('marks.create', compact('students', 'exams', 'subjects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required',
            'exam_id' => 'required',
            'subject_id' => 'required',
            'marks_obtained' => 'required|numeric',
        ]);

        $mark = new Mark();
        $mark->student_id = $request->student_id;
        $mark->exam_id = $request->exam_id;
        $mark->subject_id = $request->subject_id;
        $mark->marks_obtained = $request->marks_obtained;
        $mark->total_marks = $request->total_marks ?? 100; // Default to 100 if not provided
        $mark->grade = $request->grade ?? 'N/A'; // Default to 'N/A' if not provided
        $mark->remarks = $request->remarks ?? '';
        $mark->recorded_by = Auth::id(); // Assuming the user is logged in
        $mark->recorded_at = now(); // Current timestamp
      

        return redirect()->route('marks.index')->with('success', 'Mark added successfully.');
    }

    public function edit(Mark $mark)
    {
        $students = Student::all();
        $exams = Exam::all();
        $subjects = Subject::all();
        return view('marks.edit', compact('mark', 'students', 'exams', 'subjects'));
    }

    public function update(Request $request, Mark $mark)
    {
        $request->validate([
            'marks_obtained' => 'required|numeric',
        ]);

        $mark->update($request->all());

        return redirect()->route('marks.index')->with('success', 'Mark updated successfully.');
    }

    public function destroy(Mark $mark)
    {
        $mark->delete();
        return redirect()->route('marks.index')->with('success', 'Mark deleted.');
    }
}