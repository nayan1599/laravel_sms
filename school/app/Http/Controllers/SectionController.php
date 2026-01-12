<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\ClassModel;
use App\Models\Teachers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SectionController extends Controller
{



public function index()
{
    // 🔹 Section wise total students
    $sectioncount = DB::table('sections')
        ->leftJoin('students', 'students.section_id', '=', 'sections.id')
        ->select(
            'sections.id',
            'sections.section_name',
            DB::raw('COUNT(students.id) as total_students')
        )
        ->groupBy('sections.id', 'sections.section_name')
        ->get();

    // 🔹 Section list with class & teacher
    $sections = Section::with(['class', 'teacher'])
        ->latest()
        ->paginate(10);

    return view('sections.index', compact('sections', 'sectioncount'));
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
