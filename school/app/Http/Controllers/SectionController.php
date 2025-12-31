<?php

namespace App\Http\Controllers;
use App\Models\Section;
use App\Models\ClassModel;
use App\Models\Teachers;
use Illuminate\Http\Request;
 
class SectionController extends Controller
{

    public function index()
    {
        $sections = Section::with(['class', 'teacher'])->paginate(10);
        return view('sections.index', compact('sections'));
    }

    public function create()
    {
        $classes = ClassModel::all();
        $teachers = Teachers::all();
        return view('sections.create', compact('classes', 'teachers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'class_id' => 'required|exists:classes,id',
            'section_name' => 'required|string|max:10',
            'section_capacity' => 'nullable|integer|min:1',
            'section_teacher_id' => 'nullable|exists:teachers,id',
            'status' => 'required|in:active,inactive',
        ]);

        Section::create($request->all());

        return redirect()->route('sections.index')->with('success', 'Section created successfully.');
    }

    public function edit(Section $section)
    {
        $classes = ClassModel::all();
        $teachers = Teachers::all();
        return view('sections.edit', compact('section', 'classes', 'teachers'));
    }

    public function update(Request $request, Section $section)
    {
        $request->validate([
            'class_id' => 'required|exists:classes,id',
            'section_name' => 'required|string|max:10',
            'section_capacity' => 'nullable|integer|min:1',
            'section_teacher_id' => 'nullable|exists:teachers,id',
            'status' => 'required|in:active,inactive',
        ]);

        $section->update($request->all());

        return redirect()->route('sections.index')->with('success', 'Section updated successfully.');
    }

    public function destroy(Section $section)
    {
        $section->delete();
        return redirect()->route('sections.index')->with('success', 'Section deleted successfully.');
    }
}
