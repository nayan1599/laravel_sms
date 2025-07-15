@extends('layouts.layouts')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0">👨‍🏫 Teacher Attendance Form</h4>
        <a href="{{ route('teacherattendance.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left"></i> Back to List
        </a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <h6 class="mb-2">Please fix the following errors:</h6>
            <ul class="mb-0 ps-3">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('teacherattendance.store') }}" method="POST">
        @csrf

        <div class="row mb-4">
            <div class="col-md-4">
                <label for="date" class="form-label fw-semibold">Attendance Date <span class="text-danger">*</span></label>
                <input type="date" name="date" id="date" class="form-control" required value="{{ old('date', date('Y-m-d')) }}">
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered align-middle text-center">
                <thead class="table-dark">
                    <tr>
                        <th>Teacher Name</th>
                        <th>Present</th>
                        <th>Absent</th>
                        <th>Late</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($teachers as $teacher)
                        <tr>
                            <td class="text-start">{{ $teacher->name }}</td>
                            <td>
                                <input type="radio" name="attendances[{{ $teacher->id }}]" value="present"
                                    {{ old("attendances.$teacher->id", 'present') === 'present' ? 'checked' : '' }}>
                            </td>
                            <td>
                                <input type="radio" name="attendances[{{ $teacher->id }}]" value="absent"
                                    {{ old("attendances.$teacher->id") === 'absent' ? 'checked' : '' }}>
                            </td>
                            <td>
                                <input type="radio" name="attendances[{{ $teacher->id }}]" value="late"
                                    {{ old("attendances.$teacher->id") === 'late' ? 'checked' : '' }}>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">No teachers found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-success me-2">
                <i class="bi bi-check-circle-fill"></i> Save Attendance
            </button>
            <a href="{{ route('teacherattendance.index') }}" class="btn btn-secondary">
                <i class="bi bi-x-circle"></i> Cancel
            </a>
        </div>
    </form>
</div>
@endsection
