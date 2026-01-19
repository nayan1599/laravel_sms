<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TeacherDepartment as Department;

class TeacherDepartmentController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        $departments = Department::latest()->get();
        return view('teacherdepartments.index', compact('departments'));
    }

    public function create()
    {
        return view('teacherdepartments.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:150|unique:departments,name',
            'name_bn' => 'required|string|max:150|unique:departments,name_bn',
            'description' => 'nullable|string',
            'is_active' => 'required|in:active,inactive',
        ]);

        Department::create($validated);

        return redirect()->route('teacherdepartments.index')
            ->with('success', 'Department created successfully.');
    }

    public function edit(Department $department)
    {
        return view('teacherdepartments.edit', compact('department'));
    }

    public function update(Request $request, Department $department)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:150|unique:departments,name,' . $department->id,
            'name_bn' => 'required|string|max:150|unique:departments,name_bn,' . $department->id,
            'description' => 'nullable|string',
            'is_active' => 'required|in:active,inactive',
        ]);

        $department->update($validated);

        return redirect()->route('teacherdepartments.index')
            ->with('success', 'Department updated successfully.');
    }

    public function destroy(Department $department)
    {
        $department->delete();

        return redirect()->route('teacherdepartments.index')
            ->with('success', 'Department deleted successfully.');
    }
}
