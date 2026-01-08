@extends('layouts.app')

@section('title','Edit Student Attendance')

@section('content')
<div class="container py-4">

    <div class="card shadow">
        <div class="card-header bg-warning text-white">
            <h5 class="mb-0"><i class="bi bi-pencil-square me-1"></i> Edit Attendance</h5>
        </div>

        <form method="POST" action="{{ route('attendance.update', $attendance->id) }}">
            @csrf
            @method('PUT')

            <div class="card-body">

                <div class="row mb-3">
                    <div class="col-md-3">
                        <label class="form-label">Attendance Date</label>
                        <input type="date" name="attendance_date" class="form-control"
                               value="{{ $attendance->attendance_date }}" required>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Class</label>
                        <select name="class_id" class="form-select" required>
                            @foreach($classes as $class)
                            <option value="{{ $class->id }}" {{ $attendance->class_id == $class->id ? 'selected' : '' }}>
                                {{ $class->class_name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Section</label>
                        <select name="section_id" class="form-select">
                            <option value="">Select Section</option>
                            @foreach($sections as $section)
                            <option value="{{ $section->id }}" {{ $attendance->section_id == $section->id ? 'selected' : '' }}>
                                {{ $section->section_name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Subject</label>
                        <select name="subject_id" class="form-select">
                            <option value="">Select Subject</option>
                            @foreach($subjects as $subject)
                            <option value="{{ $subject->id }}" {{ $attendance->subject_id == $subject->id ? 'selected' : '' }}>
                                {{ $subject->subject_name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label class="form-label">Student</label>
                        <select name="student_id" class="form-select" required>
                            @foreach($students as $student)
                            <option value="{{ $student->id }}" {{ $attendance->student_id == $student->id ? 'selected' : '' }}>
                                {{ $student->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select" required>
                            @foreach(['present','absent','late','leave'] as $status)
                            <option value="{{ $status }}" {{ $attendance->status == $status ? 'selected' : '' }}>
                                {{ ucfirst($status) }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Remarks</label>
                        <input type="text" name="remarks" class="form-control"
                               value="{{ $attendance->remarks }}">
                    </div>
                </div>

            </div>

            <div class="card-footer text-end">
                <a href="{{ route('attendance.index') }}" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-warning">Update Attendance</button>
            </div>
        </form>
    </div>

</div>
@endsection
