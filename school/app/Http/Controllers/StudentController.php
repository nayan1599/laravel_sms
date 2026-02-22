<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\ClassModel;
use App\Models\BloodGroup;
use App\Models\Section;
use App\Models\OrganizationSetting;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    public function index()
    {
        $totalStudents = Student::count();
        
        $studentsByClass = Student::join('classes', 'students.class_id', '=', 'classes.id')
            ->select(
                'classes.id as class_id',
                'classes.class_name as class_names',
                DB::raw('COUNT(students.id) as total')
            )
            ->groupBy('classes.id', 'classes.class_name')
            ->get();

        $students = Student::with(['class', 'section', 'bloodGroup'])->latest()->paginate(10);
        
        return view('students.index', compact('students', 'totalStudents', 'studentsByClass'));
    }

    public function create()
    {
        $bloodgroups = BloodGroup::all();
        $classes = ClassModel::all();
        $sections = Section::all();
        
        return view('students.create', compact('classes', 'bloodgroups', 'sections'));
    }

public function store(Request $request)
{
    $data = $request->validate([
        'name' => 'required|string|max:255',
        'date_of_birth' => 'nullable|date',
        'gender' => 'nullable|in:male,female,other',
        'blood_group' => 'nullable|string|max:10',
        'religion' => 'nullable|string|max:50',
        'nationality' => 'nullable|string|max:50',
        'birth_cert_no' => 'nullable|string|max:30',
        'contact' => 'nullable|string|max:20',
        'email' => 'nullable|email|unique:students,email',
        'present_address' => 'nullable|string',
        'permanent_address' => 'nullable|string',
        'father_name' => 'nullable|string|max:100',
        'mother_name' => 'nullable|string|max:100',
        'guardian_phone' => 'nullable|string|max:20',
        'guardian_occupation' => 'nullable|string|max:100',
        'class_id' => 'required|exists:classes,id',
        'section_id' => 'nullable|exists:sections,id',
        'roll' => [
            'nullable',
            'integer',
            Rule::unique('students')->where(function ($query) use ($request) {
                return $query->where('class_id', $request->class_id)
                             ->where('section_id', $request->section_id);
            }),
        ],
        'previous_school' => 'nullable|string|max:150',
        'last_exam_result' => 'nullable|string|max:50',
        'admission_date' => 'nullable|date',
        'residential_type' => 'nullable|string|max:50',
        'remarks' => 'nullable|string',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    // Add user_id from authenticated user
    $data['user_id'] = auth()->id(); // This adds the logged-in user's ID

    if ($request->hasFile('photo')) {
        $file = $request->file('photo');
        $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads/students'), $filename);
        $data['photo'] = 'uploads/students/' . $filename;
    }

    Student::create($data);
    
    return redirect()->route('students.index')
        ->with('success', 'Student Added Successfully!');
}

    public function studentsByClass(Request $request, $class_id)
    {
        $class = ClassModel::with('sections')->findOrFail($class_id);
        
        $query = Student::where('class_id', $class_id)
            ->with(['section', 'bloodGroup']);
        
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('roll', 'like', "%{$search}%")
                    ->orWhere('father_name', 'like', "%{$search}%")
                    ->orWhere('mother_name', 'like', "%{$search}%");
            });
        }

        if ($request->filled('section_id')) {
            $query->where('section_id', $request->section_id);
        }

        $students = $query->orderBy('roll')->paginate(10);

        return view('students.byclass', compact('students', 'class'));
    }

    public function show($id)
    {
        $org_settings = OrganizationSetting::first();
        $student = Student::with(['class', 'section', 'bloodGroup'])->findOrFail($id);
        
        return view('students.show', compact('student', 'org_settings'));
    }

    public function edit(Student $student)
    {
        $classes = ClassModel::all();
        $sections = Section::all();
        $bloodgroups = BloodGroup::all();
        
        return view('students.edit', compact('student', 'classes', 'sections', 'bloodgroups'));
    }

    public function update(Request $request, Student $student)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'date_of_birth' => 'nullable|date',
            'gender' => 'nullable|in:male,female,other',
            'blood_group' => 'nullable|string|max:10',
            'religion' => 'nullable|string|max:50',
            'nationality' => 'nullable|string|max:50',
            'birth_cert_no' => 'nullable|string|max:30',
            'contact' => 'nullable|string|max:20',
            'email' => 'nullable|email|unique:students,email,' . $student->id,
            'present_address' => 'nullable|string',
            'permanent_address' => 'nullable|string',
            'father_name' => 'nullable|string|max:100',
            'mother_name' => 'nullable|string|max:100',
            'guardian_phone' => 'nullable|string|max:20',
            'guardian_occupation' => 'nullable|string|max:100',
            'class_id' => 'required|exists:classes,id',
            'section_id' => 'nullable|exists:sections,id',
            'roll' => [
                'nullable',
                'integer',
                Rule::unique('students')->where(function ($query) use ($request) {
                    return $query->where('class_id', $request->class_id)
                                 ->where('section_id', $request->section_id);
                })->ignore($student->id),
            ],
            'previous_school' => 'nullable|string|max:150',
            'last_exam_result' => 'nullable|string|max:50',
            'admission_date' => 'nullable|date',
            'residential_type' => 'nullable|string|max:50',
            'remarks' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($student->photo && file_exists(public_path($student->photo))) {
                unlink(public_path($student->photo));
            }

            $file = $request->file('photo');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/students'), $filename);
            $data['photo'] = 'uploads/students/' . $filename;
        }

        $student->update($data);
        
        return redirect()->route('students.index')
            ->with('success', 'Student Updated Successfully!');
    }

    public function destroy(Student $student)
    {
        // Delete photo if exists
        if ($student->photo && file_exists(public_path($student->photo))) {
            unlink(public_path($student->photo));
        }

        $student->delete();
        
        return redirect()->route('students.index')
            ->with('success', 'Student Deleted Successfully!');
    }

    /**
     * Get students by class for API/AJAX requests
     */
    public function getByClass($class_id)
    {
        $students = Student::where('class_id', $class_id)
            ->with('section')
            ->orderBy('roll')
            ->get(['id', 'name', 'roll', 'section_id']);
            
        return response()->json($students);
    }

    /**
     * Check if roll number is unique for a class/section
     */
    public function checkRoll(Request $request)
    {
        $exists = Student::where('class_id', $request->class_id)
            ->where('section_id', $request->section_id)
            ->where('roll', $request->roll)
            ->when($request->student_id, function ($query) use ($request) {
                return $query->where('id', '!=', $request->student_id);
            })
            ->exists();
            
        return response()->json(['unique' => !$exists]);
    }
}