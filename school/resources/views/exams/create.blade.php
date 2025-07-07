@extends('layouts.layouts')

@section('content')
<div class="container">
    <h2>{{ isset($exam) ? 'Edit' : 'Add' }} Exam</h2>
    <form action="{{ isset($exam) ? route('exams.update', $exam->id) : route('exams.store') }}" method="POST">
        @csrf
        @if(isset($exam)) @method('PUT') @endif

        <div class="mb-3">
            <label>Exam Name</label>
            <input type="text" name="exam_name" class="form-control" value="{{ old('exam_name', $exam->exam_name ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label>Class</label>
            <select name="class_id" class="form-control" required>
                <option value="">Select</option>
                @foreach($classes as $class)
                    <option value="{{ $class->id }}" {{ (old('class_id', $exam->class_id ?? '') == $class->id) ? 'selected' : '' }}>
                        {{ $class->class_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Section</label>
            <select name="section_id" class="form-control">
                <option value="">Select</option>
                @foreach($sections as $section)
                    <option value="{{ $section->id }}" {{ (old('section_id', $exam->section_id ?? '') == $section->id) ? 'selected' : '' }}>
                        {{ $section->section_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Subject</label>
            <select name="subject_id" class="form-control">
                <option value="">Select</option>
                @foreach($subjects as $subject)
                    <option value="{{ $subject->id }}" {{ (old('subject_id', $exam->subject_id ?? '') == $subject->id) ? 'selected' : '' }}>
                        {{ $subject->subject_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Exam Date</label>
            <input type="date" name="exam_date" class="form-control" value="{{ old('exam_date', $exam->exam_date ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label>Start Time</label>
            <input type="time" name="start_time" class="form-control" value="{{ old('start_time', $exam->start_time ?? '') }}">
        </div>

        <div class="mb-3">
            <label>End Time</label>
            <input type="time" name="end_time" class="form-control" value="{{ old('end_time', $exam->end_time ?? '') }}">
        </div>

        <div class="mb-3">
            <label>Total Marks</label>
            <input type="number" name="total_marks" class="form-control" value="{{ old('total_marks', $exam->total_marks ?? 100) }}" required>
        </div>

        <div class="mb-3">
            <label>Pass Marks</label>
            <input type="number" name="pass_marks" class="form-control" value="{{ old('pass_marks', $exam->pass_marks ?? 33) }}" required>
        </div>

        <div class="mb-3">
            <label>Exam Type</label>
            <select name="exam_type" class="form-control">
                <option value="written" {{ old('exam_type', $exam->exam_type ?? '') == 'written' ? 'selected' : '' }}>Written</option>
                <option value="oral" {{ old('exam_type', $exam->exam_type ?? '') == 'oral' ? 'selected' : '' }}>Oral</option>
                <option value="practical" {{ old('exam_type', $exam->exam_type ?? '') == 'practical' ? 'selected' : '' }}>Practical</option>
                <option value="online" {{ old('exam_type', $exam->exam_type ?? '') == 'online' ? 'selected' : '' }}>Online</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="scheduled" {{ old('status', $exam->status ?? '') == 'scheduled' ? 'selected' : '' }}>Scheduled</option>
                <option value="completed" {{ old('status', $exam->status ?? '') == 'completed' ? 'selected' : '' }}>Completed</option>
                <option value="cancelled" {{ old('status', $exam->status ?? '') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
            </select>
        </div>

        <button class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
