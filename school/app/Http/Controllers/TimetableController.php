<?php

namespace App\Http\Controllers;

use App\Models\Timetable;
use App\Models\Period;
use App\Models\Subject;
use App\Models\Teachers;
use App\Models\ClassModel;
use Illuminate\Http\Request;

class TimetableController extends Controller
{
    public function index()
    {
        $timetables = Timetable::with([
            'academicYear',
            'class',
            'period',
            'subject',
            'teacher',
            'room'
        ])
        ->orderBy('day_of_week')
        ->orderBy('period_id')
        ->get();

        return view('timetables.index', compact('timetables'));
    }

    public function create()
    {
        return view('timetables.create', [
            
            'classes' => ClassModel::all(),
            'periods' => Period::orderBy('sort_order')->get(),
            'subjects' => Subject::all(),
            'teachers' => Teachers::all(),
        
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'academic_year_id' => 'required',
            'class_id' => 'required',
            'day_of_week' => 'required|integer|between:0,6',
            'period_id' => 'required',
            'subject_id' => 'required',
            'teacher_id' => 'required',
        ]);

        Timetable::create($request->all());

        return redirect()
            ->route('timetables.index')
            ->with('success', 'Timetable created successfully');
    }

    public function edit(Timetable $timetable)
    {
        return view('timetables.edit', [
            'timetable' => $timetable,
            
            'classes' => ClassModel::all(),
            'periods' => Period::orderBy('sort_order')->get(),
            'subjects' => Subject::all(),
            'teachers' => Teachers::all(),
         ]);
    }

    public function update(Request $request, Timetable $timetable)
    {
        $timetable->update($request->all());

        return redirect()
            ->route('timetables.index')
            ->with('success', 'Timetable updated successfully');
    }

    public function destroy(Timetable $timetable)
    {
        $timetable->delete();

        return back()->with('success', 'Timetable deleted');
    }
}
