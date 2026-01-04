<?php

namespace App\Http\Controllers;

use App\Models\FeeType;
use App\Models\ClassModel; 
use Illuminate\Http\Request;

class FeeTypeController extends Controller
{
    public function index()
    {

        $feeTypes = FeeType::all();
        $classModel = ClassModel::all();
      return view('fee_types.index', compact('feeTypes', 'classModel'));
    }

    public function create()
    {
        $classModel = ClassModel::all();
        return view('fee_types.create', compact('classModel'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100|unique:fee_types,name',
            'description' => 'nullable|string',
            'default_amount' => 'required|numeric|min:0',
            'class_id' => 'required|exists:classes,id',
            'expiry_date' => 'nullable|date',
        ]);

        FeeType::create($request->all());
        return redirect()->route('fee-types.index')->with('success', 'Fee Type added successfully.');
    }

    public function edit(FeeType $feeType)
    {
        $classModel = ClassModel::all();
        return view('fee_types.edit', compact('feeType', 'classModel'));
    }

    public function update(Request $request, FeeType $feeType)
    {
        $request->validate([
            'name' => 'required|string|max:100|unique:fee_types,name,' . $feeType->id,
            'description' => 'nullable|string',
            'default_amount' => 'required|numeric|min:0',
            'class_id' => 'required|exists:classes,id',
            'expiry_date' => 'nullable|date',
        ]);

        

        $feeType->update($request->all());
        return redirect()->route('fee-types.index')->with('success', 'Fee Type updated successfully.');
    }

    public function destroy(FeeType $feeType)
    {
        $feeType->delete();
        return redirect()->route('fee-types.index')->with('success', 'Fee Type deleted successfully.');
    }
}
