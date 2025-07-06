@extends('layouts.layouts')

@section('content')
<div class="container">
    <h2>Edit Subject</h2>

    <form action="{{ route('subjects.update', $subject->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="subject_name" class="form-label">Subject Name</label>
            <input type="text" name="subject_name" class="form-control" required value="{{ old('subject_name', $subject->subject_name) }}">
        </div>

        <div class="mb-3">
            <label for="subject_code" class="form-label">Subject Code</label>
            <input type="text" name="subject_code" class="form-control" required value="{{ old('subject_code', $subject->subject_code) }}">
        </div>

        <div class="mb-3">
            <label for="class_id" class="form-label">Class</label>
            <select name="class_id" class="form-select" required>
                <option value="">Select Class</option>
                @foreach ($classes as $class)
                    <option value="{{ $class->id }}" {{ $subject->class_id == $class->id ? 'selected' : '' }}>{{ $class->class_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <select name="type" class="form-select">
                <option value="compulsory" {{ $subject->type == 'compulsory' ? 'selected' : '' }}>Compulsory</option>
                <option value="optional" {{ $subject->type == 'optional' ? 'selected' : '' }}>Optional</option>
            </select>
        </div>

        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="full_marks" class="form-label">Full Marks</label>
                <input type="number" name="full_marks" class="form-control" value="{{ old('full_marks', $subject->full_marks) }}">
            </div>
            <div class="col-md-4 mb-3">
                <label for="pass_marks" class="form-label">Pass Marks</label>
                <input type="number" name="pass_marks" class="form-control" value="{{ old('pass_marks', $subject->pass_marks) }}">
            </div>
            <div class="col-md-4 mb-3">
                <label for="practical_marks" class="form-label">Practical Marks</label>
                <input type="number" name="practical_marks" class="form-control" value="{{ old('practical_marks', $subject->practical_marks) }}">
            </div>
        </div>

        <div class="mb-3">
            <label for="subject_teacher_id" class="form-label">Subject Teacher</label>
            <select name="subject_teacher_id" class="form-select">
                <option value="">-- Optional --</option>
                @foreach ($teachers as $teacher)
                    <option value="{{ $teacher->id }}" {{ $subject->subject_teacher_id == $teacher->id ? 'selected' : '' }}>{{ $teacher->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" class="form-select">
                <option value="active" {{ $subject->status == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ $subject->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Subject</button>
        <a href="{{ route('subjects.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
