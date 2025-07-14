<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassModel;
use App\Models\Teachers;

class ClassController extends Controller
{
    public function index()
    {
        $classes = ClassModel::with('teacher')->paginate(10);
        return view('classes.index', compact('classes'));
    }

    public function create()
    {
        $teachers = Teachers::all();
        return view('classes.create', compact('teachers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'class_name' => 'required|string|max:50',
            'class_numeric' => 'required|integer',
            'class_code' => 'nullable|string|max:10|unique:classes,class_code',
            'medium' => 'required|in:bangla,english,bilingual',
            'shift' => 'required|in:morning,day,evening',
            'class_teacher_id' => 'nullable|exists:teachers,id',
            'status' => 'required|in:active,inactive',
        ]);
   
        ClassModel::create($request->all());
        return redirect()->route('classes.index')->with('success', 'Class created successfully.');
    }

    public function show($id)
    {
        $class = ClassModel::with('teacher')->findOrFail($id);
        return view('classes.show', compact('class'));
    }

    public function edit($id)
    {
        $class = ClassModel::findOrFail($id);
        $teachers = Teachers::all();
        return view('classes.edit', compact('class', 'teachers'));
    }

    public function update(Request $request, $id)
    {
        $class = ClassModel::findOrFail($id);

        $request->validate([
            'class_name' => 'required|string|max:50',
            'class_numeric' => 'required|integer',
            'class_code' => 'nullable|string|max:10|unique:classes,class_code,' . $class->id,
            'medium' => 'required|in:bangla,english,bilingual',
            'shift' => 'required|in:morning,day,evening',
            'class_teacher_id' => 'nullable|exists:teachers,id',
            'status' => 'required|in:active,inactive',
        ]);

        $class->update($request->all());

        return redirect()->route('classes.index')->with('success', 'Class updated successfully.');
    }

    public function destroy($id)
    {
        $class = ClassModel::findOrFail($id);
        $class->delete();

        return redirect()->route('classes.index')->with('success', 'Class deleted successfully.');
    }
}
