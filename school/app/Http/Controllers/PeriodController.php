<?php

namespace App\Http\Controllers;

use App\Models\Period;
use Illuminate\Http\Request;

class PeriodController extends Controller
{
    public function index()
    {
        $periods = Period::orderBy('sort_order')
            ->orderBy('period_number')
            ->get();

        return view('periods.index', compact('periods'));
    }
    public function show( $id)
{
    return redirect()->route('periods.index');
}


    public function create()
    {
        return view('periods.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'period_number' => 'required|integer|min:1',
            'name'          => 'nullable|string|max:50',
            'start_time'    => 'required|date_format:H:i',
            'end_time'      => 'required|date_format:H:i|after:start_time',
            'sort_order'    => 'required|integer|min:0',
            'is_break'      => 'nullable|boolean',
        ]);

        $data['is_break'] = $request->has('is_break');

        Period::create($data);

        return redirect()
            ->route('periods.index')
            ->with('success', 'Period created successfully');
    }

    public function edit(Period $period)
    {
    return view('periods.edit', compact('period'));
    }

    public function update(Request $request, Period $period)
    {
        $data = $request->validate([
            'period_number' => 'required|integer|min:1',
            'name'          => 'nullable|string|max:50',
            'start_time'    => 'required|date_format:H:i',
            'end_time'      => 'required|date_format:H:i|after:start_time',
            'sort_order'    => 'required|integer|min:0',
            'is_break'      => 'nullable|boolean',
        ]);

        $data['is_break'] = $request->has('is_break');

        $period->update($data);

        return redirect()
            ->route('periods.index')
            ->with('success', 'Period updated successfully');
    }

    public function destroy(Period $period)
    {
        $period->delete();

        return redirect()
            ->route('periods.index')
            ->with('success', 'Period deleted successfully');
    }
}
