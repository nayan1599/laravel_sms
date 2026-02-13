<?php

namespace App\Http\Controllers;

use App\Models\Timetable;
use App\Models\Period;
use App\Models\Subject;
use App\Models\Teachers;
use App\Models\ClassModel;
use App\Models\Room;
use App\Models\Week;
use Illuminate\Http\Request;

class TimetableController extends Controller
{
public function index()
{
 
    $classes = Timetable::with('class', 'period')
        ->select('class_id')
        ->groupBy('class_id')
        ->paginate(10);

    return view('timetables.index', compact('classes'));
}


    public function create()
    {
        return view('timetables.create', [

            'classes' => ClassModel::all(),
            'periods' => Period::orderBy('sort_order')->get(),
            'subjects' => Subject::all(),
            'teachers' => Teachers::all(),
            'rooms' => Room::all(),
            'weeks' => Week::all(),

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




  public function show($id)
{
    $timetable = Timetable::with([
        'class',
        'subject',
        'teacher',
        'period',
        'weeks'
        
    ])
    ->where('class_id', $id)
    ->orderBy('day_of_week')
    ->orderBy('period_id')
    ->get();

    $class = ClassModel::findOrFail($id);
     $weeks = Week::orderBy('id')->get(); // dynamic days
    return view('timetables.show', compact('timetable', 'class', 'weeks'));
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
