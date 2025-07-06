@extends('layouts.layouts')

@section('content')
<div class="container">
    <h2>Take Attendance</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('attendance.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="attendance_date" class="form-label">Date</label>
            <input type="date" name="attendance_date" class="form-control" value="{{ old('attendance_date', date('Y-m-d')) }}" required>
        </div>

        <div class="mb-3">
            <label for="student_id" class="form-label">Student</label>
            <select name="student_id" class="form-select" required>
                <option value="">Select Student</option>
                @foreach ($students as $student)
                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="class_id" class="form-label">Class</label>
            <select name="class_id" class="form-select" required>
                @foreach ($classes as $class)
                    <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="section_id" class="form-label">Section</label>
            <select name="section_id" class="form-select">
                <option value="">None</option>
                @foreach ($sections as $section)
                    <option value="{{ $section->id }}">{{ $section->section_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="subject_id" class="form-label">Subject (optional)</label>
            <select name="subject_id" class="form-select">
                <option value="">None</option>
                @foreach ($subjects as $subject)
                    <option value="{{ $subject->id }}">{{ $subject->subject_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Attendance Status</label>
            <select name="status" class="form-select">
                <option value="present">Present</option>
                <option value="absent">Absent</option>
                <option value="late">Late</option>
                <option value="leave">Leave</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="remarks" class="form-label">Remarks (optional)</label>
            <input type="text" name="remarks" class="form-control" value="{{ old('remarks') }}">
        </div>

        <button type="submit" class="btn btn-success">Save Attendance</button>
        <a href="{{ route('attendance.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
