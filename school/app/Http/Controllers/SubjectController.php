<?php
namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\ClassModel;
use App\Models\Teachers;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::with(['class', 'teacher'])->paginate(30);
        return view('subjects.index', compact('subjects'));
    }

    public function create()
    {
        $classes = ClassModel::all();
        $teachers = Teachers::all();
        return view('subjects.create', compact('classes', 'teachers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'subject_name' => 'required|string|max:100',
            'subject_code' => 'required|unique:subjects,subject_code',
            'class_id' => 'required|exists:classes,id',
        ]);

        Subject::create($request->all());

        return redirect()->route('subjects.index')->with('success', 'Subject created successfully.');
    }

    public function edit(Subject $subject)
    {
        $classes = ClassModel::all();
        $teachers = Teachers::all();
        return view('subjects.edit', compact('subject', 'classes', 'teachers'));
    }

    public function update(Request $request, Subject $subject)
    {
        $request->validate([
            'subject_name' => 'required|string|max:100',
            'subject_code' => 'required|unique:subjects,subject_code,' . $subject->id,
            'class_id' => 'required|exists:classes,id',
        ]);

        $subject->update($request->all());

        return redirect()->route('subjects.index')->with('success', 'Subject updated successfully.');
    }

    public function destroy(Subject $subject)
    {
        $subject->delete();
        return redirect()->route('subjects.index')->with('success', 'Subject deleted successfully.');
    }
}
