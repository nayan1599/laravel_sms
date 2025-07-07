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

        <!-- Similar for section_id, subject_id, exam_date, start_time, end_time -->

        <div class="mb-3">
            <label>Exam Date</label>
            <input type="date" name="exam_date" class="form-control" value="{{ old('exam_date', $exam->exam_date ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label>Type</label>
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
