@extends('layouts.layouts')

@section('content')
<div class="container py-4">
    <h4>Teacher Attendance Form</h4>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('teacherattendance.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="date" class="form-label">Date <span class="text-danger">*</span></label>
            <input type="date" name="date" id="date" class="form-control" required value="{{ old('date', date('Y-m-d')) }}">
        </div>

        <table class="table table-bordered table-striped">
        <thead class="table-dark">
                <tr>
                    <th>Teacher Name</th>
                    <th>Present</th>
                    <th>Absent</th>
                    <th>Late</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($teachers as $teacher)
                <tr>
                    <td>{{ $teacher->name }}</td>
                    <td>
                        <input type="radio" name="attendances[{{ $teacher->id }}]" value="present" {{ old("attendances.$teacher->id") == 'present' ? 'checked' : '' }} checked>
                    </td>
                    <td>
                        <input type="radio" name="attendances[{{ $teacher->id }}]" value="absent" {{ old("attendances.$teacher->id") == 'absent' ? 'checked' : '' }}>
                    </td>
                    <td>
                        <input type="radio" name="attendances[{{ $teacher->id }}]" value="late" {{ old("attendances.$teacher->id") == 'late' ? 'checked' : '' }}>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <button type="submit" class="btn btn-success">
            <i class="bi bi-save2"></i> Save Attendance
        </button>
        <a href="{{ route('teacherattendance.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
