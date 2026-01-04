@extends('layouts.layouts')

@section('content')
<div class="container py-4">
    <h4>Edit Teacher Attendance</h4>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('teacherattendance.update', $attendance->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="teacher_id" class="form-label">Teacher</label>
            <select name="teacher_id" id="teacher_id" class="form-control" required>
                @foreach ($teachers as $teacher)
                <option value="{{ $teacher->id }}" {{ $attendance->teacher_id == $teacher->id ? 'selected' : '' }}>
                    {{ $teacher->name }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" name="date" id="date" class="form-control" required value="{{ $attendance->date }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-control" required>
                <option value="present" {{ $attendance->status == 'present' ? 'selected' : '' }}>Present</option>
                <option value="absent" {{ $attendance->status == 'absent' ? 'selected' : '' }}>Absent</option>
                <option value="late" {{ $attendance->status == 'late' ? 'selected' : '' }}>Late</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Attendance</button>
        <a href="{{ route('teacherattendance.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
