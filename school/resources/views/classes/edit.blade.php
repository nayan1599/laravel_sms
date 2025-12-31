@extends('layouts.layouts')

@section('content')
<div class="container">
    <h1>Edit Class: {{ $class->class_name }}</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('classes.update', $class->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="class_name" class="form-label">Class Name</label>
            <input type="text" class="form-control" id="class_name" name="class_name" value="{{ old('class_name', $class->class_name) }}" required maxlength="50">
        </div>

        <div class="mb-3">
            <label for="class_numeric" class="form-label">Class Numeric</label>
            <input type="number" class="form-control" id="class_numeric" name="class_numeric" value="{{ old('class_numeric', $class->class_numeric) }}" required>
        </div>

        <div class="mb-3">
            <label for="class_code" class="form-label">Class Code (optional)</label>
            <input type="text" class="form-control" id="class_code" name="class_code" value="{{ old('class_code', $class->class_code) }}" maxlength="10">
        </div>

        <div class="mb-3">
            <label for="medium" class="form-label">Medium</label>
            <select class="form-select" id="medium" name="medium" required>
                <option value="bangla" {{ old('medium', $class->medium) == 'bangla' ? 'selected' : '' }}>Bangla</option>
                <option value="english" {{ old('medium', $class->medium) == 'english' ? 'selected' : '' }}>English</option>
                <option value="bilingual" {{ old('medium', $class->medium) == 'bilingual' ? 'selected' : '' }}>Bilingual</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="shift" class="form-label">Shift</label>
            <select class="form-select" id="shift" name="shift" required>
                <option value="morning" {{ old('shift', $class->shift) == 'morning' ? 'selected' : '' }}>Morning</option>
                <option value="day" {{ old('shift', $class->shift) == 'day' ? 'selected' : '' }}>Day</option>
                <option value="evening" {{ old('shift', $class->shift) == 'evening' ? 'selected' : '' }}>Evening</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="class_teacher_id" class="form-label">Class Teacher (optional)</label>
            <select class="form-select" id="class_teacher_id" name="class_teacher_id">
                <option value="">-- Select Teacher --</option>
                @foreach($teachers as $teacher)
                    <option value="{{ $teacher->id }}" {{ old('class_teacher_id', $class->class_teacher_id) == $teacher->id ? 'selected' : '' }}>
                        {{ $teacher->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" id="status" name="status" required>
                <option value="active" {{ old('status', $class->status) == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ old('status', $class->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Class</button>
        <a href="{{ route('classes.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
