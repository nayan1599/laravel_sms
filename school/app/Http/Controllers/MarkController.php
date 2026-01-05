<?php

namespace App\Http\Controllers;

use App\Models\Mark;
use App\Models\Student;
use App\Models\Exam;
use App\Models\Subject;
use Illuminate\Http\Request;

class MarkController extends Controller
{
    public function index()
    {


        $marks = Mark::latest()->paginate(10);
        return view('marks.index', compact('marks'));

        // $marks = Mark::latest()->paginate(10);
        // return view('marks.index', compact('marks'));
    }


    public function create()
    {
        $students = Student::all();
        $exams = Exam::whereIn('status', ['scheduled'])->get(); // Example IDs
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

        Mark::create([
            'student_id' => $request->student_id,
            'exam_id' => $request->exam_id,
            'subject_id' => $request->subject_id,
            'marks_obtained' => $request->marks_obtained,
            'total_marks' => $request->total_marks ?? 100,
            'grade' => $request->grade ?? 'N/A',
            'remarks' => $request->remarks ?? '',
            'created_at' => now(),
        ]);

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

        $mark->update([
            'marks_obtained' => $request->marks_obtained,
            'total_marks' => $request->total_marks ?? $mark->total_marks,
            'grade' => $request->grade ?? $mark->grade,
            'remarks' => $request->remarks ?? $mark->remarks,
        ]);

        return redirect()->route('marks.index')->with('success', 'Mark updated successfully.');
    }

    public function show(Mark $mark)
    {
        return view('marks.show', compact('mark'));
    }

    public function destroy(Mark $mark)
    {
        $mark->delete();
        return redirect()->route('marks.index')->with('success', 'Mark deleted.');
    }

    // Show Marksheet Form
    public function marksheetForm()
    {
        $students = Student::all();
        $exams = Exam::all();
        return view('marks.marksheetForm', compact('students', 'exams'));
    }

    // View Marksheet Report
    public function viewMarksheet(Request $request)
    {
        $request->validate([
            'student_id' => 'required',
            'exam_id' => 'required',
        ]);

        // যদি 'class' রিলেশন না থাকে তাহলে with('class') বাদ দিন
        $student = Student::findOrFail($request->student_id);

        $exam = Exam::findOrFail($request->exam_id);

        $marks = Mark::where('student_id', $student->id)
            ->where('exam_id', $exam->id)
            ->with('subject')
            ->get();

        $total_obtained = $marks->sum('marks_obtained');
        $total_marks = $marks->sum('total_marks');

        return view('marks.report', compact(
            'student',
            'exam',
            'marks',
            'total_obtained',
            'total_marks'
        ));
    }
}
