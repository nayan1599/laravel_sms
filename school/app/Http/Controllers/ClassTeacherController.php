<?php

namespace App\Http\Controllers;
 
 
 use App\Models\ClassTeacher;
 use App\Models\ClassModel;
 use App\Models\Section;
 use App\Models\Teachers;
 use Illuminate\Http\Request;

class ClassTeacherController extends Controller
{
    public function index()
    {
        $data = ClassTeacher::with(['class','section','teacher'])->latest()->get();
        return view('class_teachers.index', compact('data'));
    }

    public function create()
    {
        $classes = ClassModel::all();
        $sections = Section::all();
        $teachers = Teachers::all();

        return view('class_teachers.create', compact('classes','sections','teachers'));
    }

    public function store(Request $request)
    {
        ClassTeacher::create($request->all());

        return redirect()->route('class-teachers.index')
            ->with('success', 'Class Teacher Assigned Successfully');
    }

    public function edit($id)
    {
        $item = ClassTeacher::findOrFail($id);

        $classes = ClassModel::all();
        $sections = Section::all();
        $teachers = Teachers::all();

        return view('class_teachers.edit',
            compact('item','classes','sections','teachers'));
    }

    public function update(Request $request, $id)
    {
        $item = ClassTeacher::findOrFail($id);
        $item->update($request->all());

        return redirect()->route('class-teachers.index')
            ->with('success', 'Updated Successfully');
    }

    public function destroy($id)
    {
        ClassTeacher::findOrFail($id)->delete();

        return back()->with('success', 'Deleted Successfully');
    }
}
