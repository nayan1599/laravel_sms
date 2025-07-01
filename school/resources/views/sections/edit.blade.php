@extends('layouts.layouts')

@section('content')
<div class="container">
    <h2>Edit Section</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('sections.update', $section->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="class_id" class="form-label">Class</label>
            <select name="class_id" id="class_id" class="form-select" required>
                <option value="">Select Class</option>
                @foreach($classes as $class)
                    <option value="{{ $class->id }}" {{ $section->class_id == $class->id ? 'selected' : '' }}>
                        {{ $class->class_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="section_name" class="form-label">Section Name</label>
            <input type="text" name="section_name" class="form-control" value="{{ $section->section_name }}" required>
        </div>

        <div class="mb-3">
            <label for="section_capacity" class="form-label">Section Capacity</label>
            <input type="number" name="section_capacity" class="form-control" value="{{ $section->section_capacity }}">
        </div>

        <div class="mb-3">
            <label for="section_teacher_id" class="form-label">Section Teacher (optional)</label>
            <select name="section_teacher_id" class="form-select">
                <option value="">Select Teacher</option>
                @foreach($teachers as $teacher)
                    <option value="{{ $teacher->id }}" {{ $section->section_teacher_id == $teacher->id ? 'selected' : '' }}>
                        {{ $teacher->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" class="form-select" required>
                <option value="active" {{ $section->status == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ $section->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Section</button>
        <a href="{{ route('sections.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
