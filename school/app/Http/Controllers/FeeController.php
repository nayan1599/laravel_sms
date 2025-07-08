<?php

namespace App\Http\Controllers;

use App\Models\Fee;
use App\Models\Student;
use App\Models\ClassModel; // adjust namespace/model name accordingly
use Illuminate\Http\Request;

class FeeController extends Controller
{
    public function index()
    {
        $fees = Fee::with(['student', 'class'])->paginate(10);
        return view('fees.index', compact('fees'));
    }

    public function create()
    {
        $students = Student::all();
        $classes = ClassModel::all();
        return view('fees.create', compact('students', 'classes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'class_id' => 'required|exists:classes,id',
            'fee_type' => 'required|string|max:50',
            'amount' => 'required|numeric|min:0',
            'due_date' => 'required|date',
            'payment_date' => 'nullable|date|after_or_equal:due_date',
            'payment_status' => 'required|in:pending,paid,partial,overdue',
            'paid_amount' => 'nullable|numeric|min:0',
            'receipt_number' => 'nullable|string|max:50|unique:fees,receipt_number',
            'remarks' => 'nullable|string|max:255',
        ]);

        Fee::create($request->all());

        return redirect()->route('fees.index')->with('success', 'Fee record added successfully.');
    }

    public function edit(Fee $fee)
    {
        $students = Student::all();
        $classes = ClassModel::all();
        return view('fees.edit', compact('fee', 'students', 'classes'));
    }

    public function update(Request $request, Fee $fee)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'class_id' => 'required|exists:classes,id',
            'fee_type' => 'required|string|max:50',
            'amount' => 'required|numeric|min:0',
            'due_date' => 'required|date',
            'payment_date' => 'nullable|date|after_or_equal:due_date',
            'payment_status' => 'required|in:pending,paid,partial,overdue',
            'paid_amount' => 'nullable|numeric|min:0',
            'receipt_number' => "nullable|string|max:50|unique:fees,receipt_number,{$fee->id}",
            'remarks' => 'nullable|string|max:255',
        ]);

        $fee->update($request->all());

        return redirect()->route('fees.index')->with('success', 'Fee record updated successfully.');
    }

    public function destroy(Fee $fee)
    {
        $fee->delete();
        return redirect()->route('fees.index')->with('success', 'Fee record deleted successfully.');
    }
}
