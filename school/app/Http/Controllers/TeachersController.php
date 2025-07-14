<?php

namespace App\Http\Controllers;

use App\Models\Teachers;
use Illuminate\Http\Request;
use App\Models\User;

class TeachersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = Teachers::latest()->paginate(10);
        return view('teachers.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('teachers.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'name' => 'required|string|max:150',
            'employee_id' => 'required|unique:teachers,employee_id',
            'designation' => 'required|string|max:100',
            'department' => 'nullable|string|max:100',
            'qualification' => 'nullable|string|max:255',
            'experience_years' => 'nullable|integer|min:0',
            'date_of_joining' => 'required|date',
            'date_of_leaving' => 'nullable|date',
            'subject_specialization' => 'nullable|string|max:255',
            'salary' => 'nullable|numeric|min:0',
            'employment_type' => 'required|in:permanent,contract,part-time',
            'blood_group' => 'nullable|string|max:5',
            'emergency_contact_name' => 'nullable|string|max:100',
            'emergency_contact_phone' => 'nullable|string|max:20',
            'status' => 'required|in:active,on_leave,resigned,retired',
        ]);

        Teachers::create($validated);

        return redirect()->route('teachers.index')->with('success', 'Teacher added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $teacher = Teachers::findOrFail($id);
        return view('teachers.show', compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $teacher = Teachers::findOrFail($id);
          $users = User::all();
    return view('teachers.edit', compact('teacher', 'users'));
        // return view('teachers.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $teacher = Teachers::findOrFail($id);

        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'name' => 'required|string|max:150',
            'employee_id' => 'required|unique:teachers,employee_id,' . $teacher->id,
            'designation' => 'required|string|max:100',
            'department' => 'nullable|string|max:100',
            'qualification' => 'nullable|string|max:255',
            'experience_years' => 'nullable|integer|min:0',
            'date_of_joining' => 'required|date',
            'date_of_leaving' => 'nullable|date',
            'subject_specialization' => 'nullable|string|max:255',
            'salary' => 'nullable|numeric|min:0',
            'employment_type' => 'required|in:permanent,contract,part-time',
            'blood_group' => 'nullable|string|max:5',
            'emergency_contact_name' => 'nullable|string|max:100',
            'emergency_contact_phone' => 'nullable|string|max:20',
            'status' => 'required|in:active,on_leave,resigned,retired',
        ]);

        $teacher->update($validated);

        return redirect()->route('teachers.index')->with('success', 'Teacher updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $teacher = Teachers::findOrFail($id);
        $teacher->delete();

        return redirect()->route('teachers.index')->with('success', 'Teacher deleted successfully.');
    }
}
