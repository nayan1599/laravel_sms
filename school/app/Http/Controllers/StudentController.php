<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;


class StudentController extends Controller
{
    public function index()
    {
        $students = Student::latest()->paginate(10);
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'nullable|email|unique:students',
            'phone' => 'nullable',
            'dob' => 'nullable|date',
            'gender' => 'nullable',
            'class' => 'required',
            'section' => 'nullable',
            'roll' => 'nullable',
            'address' => 'nullable',
            'photo' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/students'), $filename);
            $data['photo'] = 'uploads/students/' . $filename;
        }

        Student::create($data);
        return redirect()->route('students.index')->with('success', 'Student Added Successfully!');
    }

    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'nullable|email|unique:students,email,' . $student->id,
            'phone' => 'nullable',
            'dob' => 'nullable|date',
            'gender' => 'nullable',
            'class' => 'required',
            'section' => 'nullable',
            'roll' => 'nullable',
            'address' => 'nullable',
            'photo' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            if ($student->photo && file_exists(public_path($student->photo))) {
                unlink(public_path($student->photo));
            }
            $file = $request->file('photo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/students'), $filename);
            $data['photo'] = 'uploads/students/' . $filename;
        }

        $student->update($data);
        return redirect()->route('students.index')->with('success', 'Student Updated Successfully!');
    }

    public function destroy(Student $student)
    {
        if ($student->photo && file_exists(public_path($student->photo))) {
            unlink(public_path($student->photo));
        }

        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student Deleted Successfully!');
    }
}
