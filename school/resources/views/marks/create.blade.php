@extends('layouts.layouts')

@section('content')
<div class="container">
    <h2>Add Marks</h2>
    <form action="{{ route('marks.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Student</label>
            <select name="student_id" class="form-control" required>
                <option value="">Select</option>
                @foreach($students as $student)
                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Exam</label>
            <select name="exam_id" class="form-control" required>
                <option value="">Select</option>
                @foreach($exams as $exam)
                    <option value="{{ $exam->id }}">{{ $exam->exam_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Subject</label>
            <select name="subject_id" class="form-control" required>
                <option value="">Select</option>
                @foreach($subjects as $subject)
                    <option value="{{ $subject->id }}">{{ $subject->subject_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Marks Obtained</label>
            <input type="number" step="0.01" name="marks_obtained" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Total Marks</label>
            <input type="number" name="total_marks" class="form-control" value="100">
        </div>

        <div class="mb-3">
            <label>Grade</label>
            <input type="text" name="grade" class="form-control">
        </div>

        <div class="mb-3">
            <label>Remarks</label>
            <textarea name="remarks" class="form-control"></textarea>
        </div>

        <button class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
