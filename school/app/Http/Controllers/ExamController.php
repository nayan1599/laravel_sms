<?php
namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\ClassModel;
use App\Models\Section;
use App\Models\Subject;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function index()
    {
        $exams = Exam::with('class')->latest()->get();
        return view('exams.index', compact('exams'));
    }

    public function create()
    {
        $classes = ClassModel::all();
        $sections = Section::all();
        $subjects = Subject::all();
        return view('exams.create', compact('classes', 'sections', 'subjects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'exam_name' => 'required',
            'class_id' => 'required',
            'exam_date' => 'required|date',
        ]);

        Exam::create($request->all());
        return redirect()->route('exams.index')->with('success', 'Exam created successfully.');
    }

    public function edit(Exam $exam)
    {
        $classes = ClassModel::all();
        $sections = Section::all();
        $subjects = Subject::all();
        return view('exams.edit', compact('exam', 'classes', 'sections', 'subjects'));
    }

    public function update(Request $request, Exam $exam)
    {
        $request->validate([
            'exam_name' => 'required',
            'class_id' => 'required',
            'exam_date' => 'required|date',
        ]);

        $exam->update($request->all());
        return redirect()->route('exams.index')->with('success', 'Exam updated successfully.');
    }

    public function destroy(Exam $exam)
    {
        $exam->delete();
        return redirect()->route('exams.index')->with('success', 'Exam deleted successfully.');
    }
}