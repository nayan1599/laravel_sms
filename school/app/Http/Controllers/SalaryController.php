<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SalaryController extends Controller
{
    public function index()
    {
        $salaries = Salary::with('employee')->latest()->get();
        return view('salaries.index', compact('salaries'));
    }

    public function create()
    {
        $employees = User::where('role', 'employee')->get(); // assuming role column
        return view('salaries.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id'  => 'required|exists:users,id',
            'salary_month' => 'required|date',
            'amount'       => 'required|numeric|min:0',
            'status'       => 'required|in:pending,paid',
        ]);

        Salary::create([
            'employee_id'  => $request->employee_id,
            'salary_month' => $request->salary_month,
            'amount'       => $request->amount,
            'status'       => $request->status,
            'paid_at'      => $request->paid_at,
            'description'  => $request->description,
            'created_by'   => Auth::id(),
        ]);

        return redirect()->route('salaries.index')->with('success', 'Salary record added successfully.');
    }

    public function edit(Salary $salary)
    {
        $employees = User::where('role', 'employee')->get();
        return view('salaries.edit', compact('salary', 'employees'));
    }

    public function update(Request $request, Salary $salary)
    {
        $request->validate([
            'employee_id'  => 'required|exists:users,id',
            'salary_month' => 'required|date',
            'amount'       => 'required|numeric|min:0',
            'status'       => 'required|in:pending,paid',
        ]);

        $salary->update([
            'employee_id'  => $request->employee_id,
            'salary_month' => $request->salary_month,
            'amount'       => $request->amount,
            'status'       => $request->status,
            'paid_at'      => $request->paid_at,
            'description'  => $request->description,
        ]);

        return redirect()->route('salaries.index')->with('success', 'Salary record updated successfully.');
    }

    public function destroy(Salary $salary)
    {
        $salary->delete();
        return back()->with('success', 'Salary record deleted successfully.');
    }
}
