<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class StudentApiController extends Controller
{
    /**
     * Display a listing of students.
     * GET /api/v1/students
     */
    public function index(Request $request)
    {
        $students = Student::query()
            ->when($request->class_id, fn ($q) => $q->where('class_id', $request->class_id))
            ->when($request->search, function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('roll', 'like', '%' . $request->search . '%');
            })
            ->latest()
            ->paginate(10);

        return response()->json([
            'status' => true,
            'message' => 'Student list fetched successfully',
            'data' => $students
        ], Response::HTTP_OK);
    }

    /**
     * Store a newly created student.
     * POST /api/v1/students
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'        => 'required|string|max:255',
            'class_id'    => 'required|exists:classes,id',
            'roll'        => 'nullable|string|max:20',
            'gender'      => 'required|in:male,female,other',
            'date_of_birth' => 'required|date',
            'contact'     => 'nullable|string|max:15|unique:students,contact',
            'blood_group' => 'nullable|string|max:5',
            'photo'       => 'nullable|image|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $data = $validator->validated();

        // Photo upload
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/students'), $filename);
            $data['photo'] = 'uploads/students/' . $filename;
        }

        $student = Student::create($data);

        return response()->json([
            'status' => true,
            'message' => 'Student created successfully',
            'data' => $student
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified student.
     * GET /api/v1/students/{id}
     */
    public function show(Student $student)
    {
        return response()->json([
            'status' => true,
            'message' => 'Student details fetched successfully',
            'data' => $student
        ], Response::HTTP_OK);
    }

    /**
     * Update the specified student.
     * PUT /api/v1/students/{id}
     */
    public function update(Request $request, Student $student)
    {
        $validator = Validator::make($request->all(), [
            'name'        => 'sometimes|required|string|max:255',
            'class_id'    => 'sometimes|required|exists:classes,id',
            'roll'        => 'nullable|string|max:20',
            'gender'      => 'sometimes|required|in:male,female,other',
            'date_of_birth' => 'sometimes|required|date',
            'contact'     => 'nullable|string|max:15|unique:students,contact,' . $student->id,
            'blood_group' => 'nullable|string|max:5',
            'photo'       => 'nullable|image|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $data = $validator->validated();

        // Photo update
        if ($request->hasFile('photo')) {
            if ($student->photo && file_exists(public_path($student->photo))) {
                unlink(public_path($student->photo));
            }

            $file = $request->file('photo');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/students'), $filename);
            $data['photo'] = 'uploads/students/' . $filename;
        }

        $student->update($data);

        return response()->json([
            'status' => true,
            'message' => 'Student updated successfully',
            'data' => $student
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified student.
     * DELETE /api/v1/students/{id}
     */
    public function destroy(Student $student)
    {
        if ($student->photo && file_exists(public_path($student->photo))) {
            unlink(public_path($student->photo));
        }

        $student->delete();

        return response()->json([
            'status' => true,
            'message' => 'Student deleted successfully'
        ], Response::HTTP_OK);
    }
}
