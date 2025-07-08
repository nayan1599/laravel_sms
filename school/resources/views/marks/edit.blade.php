@extends('layouts.layouts')

@section('content')
<div class="container">
    <h2>Edit Mark</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('marks.update', $mark->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Student</label>
            <select name="student_id" class="form-control" required>
                <option value="">Select</option>
                @foreach($students as $student)
                    <option value="{{ $student->id }}" {{ $mark->student_id == $student->id ? 'selected' : '' }}>
                        {{ $student->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Exam</label>
            <select name="exam_id" class="form-control" required>
                <option value="">Select</option>
                @foreach($exams as $exam)
                    <option value="{{ $exam->id }}" {{ $mark->exam_id == $exam->id ? 'selected' : '' }}>
                        {{ $exam->exam_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Subject</label>
            <select name="subject_id" class="form-control" required>
                <option value="">Select</option>
                @foreach($subjects as $subject)
                    <option value="{{ $subject->id }}" {{ $mark->subject_id == $subject->id ? 'selected' : '' }}>
                        {{ $subject->subject_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="marks_obtained" class="form-label">Marks Obtained</label>
            <input type="number" name="marks_obtained" value="{{ $mark->marks_obtained }}" class="form-control" step="0.01" required>
        </div>

        <div class="mb-3">
            <label for="total_marks" class="form-label">Total Marks</label>
            <input type="number" name="total_marks" value="{{ $mark->total_marks }}" class="form-control">
        </div>

        <div class="mb-3">
            <label for="grade" class="form-label">Grade</label>
            <input type="text" name="grade" value="{{ $mark->grade }}" class="form-control">
        </div>

        <div class="mb-3">
            <label for="remarks" class="form-label">Remarks</label>
            <textarea name="remarks" class="form-control">{{ $mark->remarks }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update Mark</button>
        <a href="{{ route('marks.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
