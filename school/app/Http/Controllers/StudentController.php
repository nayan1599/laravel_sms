<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\ClassModel;
use App\Models\BloodGroup;
use App\Models\Section;
use App\Models\OrganizationSetting;

class StudentController extends Controller
{
    public function index()
    {

$totalStudents = Student::count();
$studentsByClass = Student::join('classes', 'students.class_id', '=', 'classes.id')
    ->select('classes.class_name as class_names', DB::raw('COUNT(students.id) as total'))
    ->groupBy('classes.class_name')
    ->get();

        $students = Student::latest()->paginate(10);
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
            'dob' => 'nullable|date',
            'gender' => 'nullable|in:male,female,other',
            'blood_group' => 'nullable|string|max:10',
            'religion' => 'nullable|string|max:50',
            'nationality' => 'nullable|string|max:50',
            'birth_cert_no' => 'nullable|string|max:30',
            'phone' => 'nullable|string|max:20',

            // ⭐ FIXED
            'email' => 'nullable|email|unique:students,email',

            'present_address' => 'nullable|string',
            'permanent_address' => 'nullable|string',
            'father_name' => 'nullable|string|max:100',
            'mother_name' => 'nullable|string|max:100',
            'guardian_phone' => 'nullable|string|max:20',
            'guardian_occupation' => 'nullable|string|max:100',
            'class_id' => 'required|exists:classes,id',
            'section_id' => 'nullable|exists:sections,id',
            'roll' => 'nullable|integer',
            'previous_school' => 'nullable|string|max:150',
            'last_exam_result' => 'nullable|string|max:50',
            'admission_date' => 'nullable|date',
            'remarks' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/students'), $filename);
            $data['photo'] = 'uploads/students/' . $filename;
        }

        Student::create($data);
        return redirect()->route('students.index')->with('success', 'Student Added Successfully!');
    }

    public function show($id)
    {
        $org_settings = OrganizationSetting::first();
 
        $student = Student::findOrFail($id);
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
            'dob' => 'nullable|date',
            'gender' => 'nullable|in:male,female,other',
            'blood_group' => 'nullable|string|max:10',
            'religion' => 'nullable|string|max:50',
            'nationality' => 'nullable|string|max:50',
            'birth_cert_no' => 'nullable|string|max:30',
            'phone' => 'nullable|string|max:20',

            // ⭐ FIXED — allow same email for current student
            'email' => 'nullable|email|unique:students,email,' . $student->id,

            'present_address' => 'nullable|string',
            'permanent_address' => 'nullable|string',
            'father_name' => 'nullable|string|max:100',
            'mother_name' => 'nullable|string|max:100',
            'guardian_phone' => 'nullable|string|max:20',
            'guardian_occupation' => 'nullable|string|max:100',
            'class_id' => 'required|exists:classes,id',
            'section_id' => 'nullable|exists:sections,id',
            'roll' => 'nullable|integer',
            'previous_school' => 'nullable|string|max:150',
            'last_exam_result' => 'nullable|string|max:50',
            'admission_date' => 'nullable|date',
            'remarks' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            if ($student->photo && file_exists(public_path($student->photo))) {
                unlink(public_path($student->photo));
            }

            $file = $request->file('photo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/students'), $filename);
            $data['photo'] = 'uploads/students/' . $filename;
        }

        $student->update($data);
        return redirect()->route('students.index')->with('success', 'Student Updated Successfully!');
    }

    public function destroy(Student $student)
    {
        if ($student->photo && file_exists(public_path($student->photo))) {
            unlink(public_path($student->photo));
        }

        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student Deleted Successfully!');
    }
}
