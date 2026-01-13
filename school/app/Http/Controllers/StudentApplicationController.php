<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\StudentApplication;
use App\Models\ClassModel;
use App\Models\User;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentApplicationController extends Controller
{



    // ADMIN LIST
    public function index()
    {
        $applications = StudentApplication::latest()->paginate(10);
        $totalApplications = StudentApplication::count();
        $approvedApplications = StudentApplication::where('status', 'approved')->count();
        $pendingApplications = StudentApplication::where('status', 'pending')->count();
        $rejectedApplications = StudentApplication::where('status', 'rejected')->count();

        return view('applications.index', compact(
            'totalApplications',
            'approvedApplications',
            'pendingApplications',
            'rejectedApplications',
            'applications'
        ));
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
        'name'          => 'required|string|max:255',
        'phone'         => 'required|string|max:20',
        'gender'        => 'required|in:male,female',
        'class_id'      => 'required|exists:classes,id',
        'email'         => 'nullable|email|max:255',
        'section_id'    => 'nullable|exists:sections,id',
        'father_name'   => 'nullable|string|max:100',
        'mother_name'   => 'nullable|string|max:100',
        'date_of_birth' => 'nullable|date',
        'address'       => 'nullable|string|max:255',
        'photo'         => 'nullable|image|max:2048',
        'status'        => 'nullable|in:pending,approved,rejected',
    ]);

    DB::transaction(function () use ($data) {

        // 1️⃣ Create User
        $user = User::create([
            'name'     => $data['name'],     // ✅ array access
            'email'    => $data['email'] ?? null,
            'phone_number'    => $data['phone'],
            'password' => bcrypt($data['phone']),
            'role'     => 'student',
        ]);

        // 2️⃣ Attach user_id with application
        $data['user_id'] = $user->id;
        $data['status']  = 'pending';

        // 3️⃣ Create Student Application
        StudentApplication::create($data);
    });

    return redirect()->back()->with('success', 'Application submitted successfully');
}


    public function edit($id)
    {
        //
        $classes = ClassModel::all();
        $sections = Section::all();
        $data = StudentApplication::findOrFail($id);
        return view('applications.edit', compact('data', 'classes', 'sections'));
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
 
            // 2️⃣ Create Student with user_id
            Student::create([
          
                'name'            => $application->name,
                'guardian_contact' => $application->phone,
                'gender'          => $application->gender,
                'class_id'        => $application->class_id,
                'father_name'     => $application->father_name,
                'date_of_birth'   => $application->date_of_birth,
            ]);

            $application->update([
                'status' => 'approved'
            ]);
        });

        return back()->with('success', 'Student approved successfully');
    }

    // update application
    public function update(Request $request, $id)
    {
        $application = StudentApplication::findOrFail($id);

        $data = $request->validate([
            'name'     => 'required|string|max:255',
            'phone'    => 'required|string|max:20',
            'gender'   => 'required|in:male,female',
            'class_id' => 'required|exists:classes,id',
            'email'    => 'nullable|email|max:255',
            'section_id' => 'nullable|exists:sections,id',
            'father_name' => 'nullable|string|max:100',
            'photo'    => 'nullable|image|max:2048',
            'status'   => 'nullable|in:pending,approved,rejected',
            'updated_at'   => now(),
        ]);
        $application->update($data);
        return redirect()->route('applications.index')->with('success', 'Application updated successfully');
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
       
        $application->delete();

        return back()->with('success', 'Application deleted successfully');
    }
}
