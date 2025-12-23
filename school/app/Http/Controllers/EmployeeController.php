<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Department;

class EmployeeController extends Controller
{
    public function index()
    {
        $totalEmployees = Employee::count();
        $totalactive = Employee::where('status', 'active')->count();
        $totalinactive = Employee::where('status', 'inactive')->count();
        $employees = Employee::latest()->paginate(10);
        return view('employees.index', compact('employees', 'totalEmployees', 'totalactive', 'totalinactive'));
    }


    public function create()
    {
        $departments = Department::all(); // অথবা ['HR', 'Accounts', 'IT'] এরকম array
        return view('employees.create', compact('departments'));
        // return view('employees.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:employees',
            'phone' => 'required',
            'designation' => 'required',
        ]);

        Employee::create($request->all());

        return redirect()->route('employees.index')->with('success', 'Employee added successfully!');
    }

    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:employees,email,' . $employee->id,
            'phone' => 'required',
            'designation' => 'required',
        ]);

        $employee->update($request->all());
        $departments = Department::all(); // অথবা ['HR', 'Accounts', 'IT'] এরকম array
        // return view('employees.create', compact('departments'))
        return redirect()->route('employees.index', compact('departments'))->with('success', 'Employee updated successfully!');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully!');
    }
}
