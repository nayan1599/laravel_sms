<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\StudentApplication;
use App\Models\ClassModel;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentApplicationController extends Controller
{
    // ADMIN LIST
  public function index()
{
    $applications = StudentApplication::latest()->paginate(10);
    return view('applications.index', compact('applications'));
}


    // PUBLIC FORM
    public function create()
    {
          $classes = ClassModel::all();
        $sections = Section::all();
        return view('applications.apply', compact('classes', 'sections'));
    }

    // STORE APPLICATION (PUBLIC)
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'     => 'required|string|max:255',
            'phone'    => 'required|string|max:20',
            'gender'   => 'required|in:male,female',
            'class_id' => 'required|exists:classes,id',
        ]);

        StudentApplication::create($data);

        return redirect()->back()->with('success', 'Application submitted successfully');
    }

    // SHOW APPLICATION
    public function show($id)
    {
        $application = StudentApplication::findOrFail($id);
        return view('applications.show', compact('application'));
    }

    // APPROVE APPLICATION
    public function approve($id)
    {
        $application = StudentApplication::findOrFail($id);

        // 🔐 Already processed check
        if ($application->status !== 'pending') {
            return back()->with('error', 'This application is already processed.');
        }

        DB::transaction(function () use ($application) {

            Student::create([
                'name'         => $application->name,
                'phone'        => $application->phone,
                'gender'       => $application->gender,
                'class_id'     => $application->class_id,
                'section_id'   => $application->section_id,
                'father_name'  => $application->father_name,
            ]);

            $application->update([
                'status' => 'approved'
            ]);
        });

        return back()->with('success', 'Student approved successfully');
    }

    // REJECT APPLICATION
    public function reject($id)
    {
        $application = StudentApplication::findOrFail($id);

        if ($application->status !== 'pending') {
            return back()->with('error', 'This application is already processed.');
        }

        $application->update([
            'status' => 'rejected'
        ]);

        return back()->with('success', 'Application rejected successfully');
    }

    // DELETE APPLICATION
    public function destroy($id)
    {
        $application = StudentApplication::findOrFail($id);

        if ($application->status === 'approved') {
            return back()->with('error', 'Approved application cannot be deleted.');
        }

        $application->delete();

        return back()->with('success', 'Application deleted successfully');
    }
}
