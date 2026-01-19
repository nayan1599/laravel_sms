<?php

namespace App\Http\Controllers;

use App\Models\Teachers;
use App\Models\User;
use App\Models\BloodGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeachersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Active / Inactive Teacher Count
        $activeTeachers = Teachers::where('status', 'active')->count();
        $inactiveTeachers = Teachers::where('status', 'inactive')->count();

        // Paginated Teacher List (searchable)
        $query = Teachers::latest();

        // Optional: Search filter
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%");
            });
        }

        $teachers = $query->paginate(10);

        return view('teachers.index', compact('teachers', 'activeTeachers', 'inactiveTeachers'));
    }






    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bloodgroups = BloodGroup::all();
        $users = User::where('role', 'teacher')->get();
        return view('teachers.create', compact('bloodgroups', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([

            'name' => 'required|string|max:150',
            'employee_id' => 'required|unique:teachers,employee_id',
            'designation' => 'required|string|max:100',
            'email'       => 'required|string|max:100',
            'department' => 'nullable|string|max:100',
            'qualification' => 'nullable|string|max:255',
            'experience_years' => 'nullable|integer|min:0',
            'date_of_joining' => 'required|date',
            'date_of_leaving' => 'nullable|date',
            'subject_specialization' => 'nullable|string|max:255',
            'salary' => 'nullable|numeric|min:0',
            'employment_type' => 'required|in:permanent,contract,part-time',
            'blood_group' => 'nullable|string|max:5',
            'emergency_contact_name' => 'nullable|string|max:100',
            'emergency_contact_phone' => 'nullable|string|max:20',
            'status' => 'required|in:active,on_leave,resigned,retired',
            // Education (array of objects)
            'education'                => 'nullable|array',
            'education.*.degree'       => 'required_with:education|string|max:100',
            'education.*.subject'      => 'nullable|string|max:150',
            'education.*.institute'    => 'nullable|string|max:200',
            'education.*.year'         => 'nullable|string|max:10',


            // Qualification & Skills
            'skills'       => 'nullable|array',
            'skills.*.company'     => 'string|max:100',
            'skills.*.role'        => 'string|max:100',
            'skills.*.duration'    => 'string|max:50',
        ]);
        DB::transaction(function () use ($validated) {

            // 1️⃣ Create User
            $user = User::create([
                'name'     => $validated['name'],     // ✅ array access
                'email'    => $validated['email'] ?? null,
                'phone_number'    => $validated['emergency_contact_phone'],
                'password' => bcrypt($validated['emergency_contact_phone']),
                'role'     => 'teacher',
            ]);

            // 2️⃣ Attach user_id with application
            $validated['user_id'] = $user->id;

            Teachers::create($validated);
            // 3️⃣ Create Student Application

        });


        return redirect()->route('teachers.index')->with('success', 'Teacher added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $teacher = Teachers::findOrFail($id);
        return view('teachers.show', compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $teacher = Teachers::findOrFail($id);
        $users = User::all();
        return view('teachers.edit', compact('teacher', 'users'));
        // return view('teachers.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $teacher = Teachers::findOrFail($id);

        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'name' => 'required|string|max:150',
            'employee_id' => 'required|unique:teachers,employee_id,' . $teacher->id,
            'designation' => 'required|string|max:100',
            'department' => 'nullable|string|max:100',
            'qualification' => 'nullable|string|max:255',
            'experience_years' => 'nullable|integer|min:0',
            'date_of_joining' => 'required|date',
            'date_of_leaving' => 'nullable|date',
            'subject_specialization' => 'nullable|string|max:255',
            'salary' => 'nullable|numeric|min:0',
            'employment_type' => 'required|in:permanent,contract,part-time',
            'blood_group' => 'nullable|string|max:5',
            'emergency_contact_name' => 'nullable|string|max:100',
            'emergency_contact_phone' => 'nullable|string|max:20',
            'status' => 'required|in:active,on_leave,resigned,retired',
        ]);

        $teacher->update($validated);

        return redirect()->route('teachers.index')->with('success', 'Teacher updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $teacher = Teachers::findOrFail($id);
        $teacher->delete();

        return redirect()->route('teachers.index')->with('success', 'Teacher deleted successfully.');
    }
}
