<?php

namespace App\Http\Controllers;

use App\Models\FeeType;
use Illuminate\Http\Request;

class FeeTypeController extends Controller
{
    public function index()
    {
        $feeTypes = FeeType::latest()->get();
        return view('fee_types.index', compact('feeTypes'));
    }

    public function create()
    {
        return view('fee_types.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'           => 'required|string|max:100|unique:fee_types,name',
            'name_bn'        => 'nullable|string|max:100',
            'code'           => 'nullable|string|max:20|unique:fee_types,code',
            'is_recurring'   => 'required|boolean',
            'frequency'      => 'required|in:ONE_TIME,MONTHLY,QUARTERLY,ANNUAL,PER_TERM,AS_NEEDED',
            'is_refundable'  => 'required|boolean',
            'description'    => 'nullable|string',
            'is_active'      => 'required|boolean',
        ]);

        FeeType::create($request->only([
            'name',
            'name_bn',
            'code',
            'is_recurring',
            'frequency',
            'is_refundable',
            'description',
            'is_active',
        ]));

        return redirect()
            ->route('fee-types.index')
            ->with('success', 'Fee Type successfully created.');
    }

    public function edit(FeeType $feeType)
    {
        return view('fee_types.edit', compact('feeType'));
    }

    public function update(Request $request, FeeType $feeType)
    {
        $request->validate([
            'name'           => 'required|string|max:100|unique:fee_types,name,' . $feeType->id,
            'name_bn'        => 'nullable|string|max:100',
            'code'           => 'nullable|string|max:20|unique:fee_types,code,' . $feeType->id,
            'is_recurring'   => 'required|boolean',
            'frequency'      => 'required|in:ONE_TIME,MONTHLY,QUARTERLY,ANNUAL,PER_TERM,AS_NEEDED',
            'is_refundable'  => 'required|boolean',
            'description'    => 'nullable|string',
            'is_active'      => 'required|boolean',
        ]);

        $feeType->update($request->only([
            'name',
            'name_bn',
            'code',
            'is_recurring',
            'frequency',
            'is_refundable',
            'description',
            'is_active',
        ]));

        return redirect()
            ->route('fee-types.index')
            ->with('success', 'Fee Type successfully updated.');
    }

    public function destroy(FeeType $feeType)
    {
        $feeType->delete();

        return redirect()
            ->route('fee-types.index')
            ->with('success', 'Fee Type successfully deleted.');
    }
}
