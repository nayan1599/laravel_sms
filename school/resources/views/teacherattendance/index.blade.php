@extends('layouts.layouts')

@section('content')
<div class="container py-4">
    <h2 class="main-title">Teacher Attendance</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="GET" action="{{ route('teacherattendance.index') }}" class="mb-3 d-flex gap-2 align-items-center">
        <label for="date">Filter by Date:</label>
        <input type="date" id="date" name="date" value="{{ $date }}" class="form-control" style="max-width: 200px;">
        <button type="submit" class="btn btn-primary">Filter</button>
        <a href="{{ route('teacherattendance.create') }}" class="btn btn-success ms-auto">
            <i class="bi bi-plus-circle"></i> Add Attendance
        </a>
    </form>

<table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Teacher Name</th>
                <th>Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($attendances as $attendance)
            <tr>
                <td>{{ $attendance->teacher->name }}</td>
                <td>{{ $attendance->date }}</td>
                <td>{{ ucfirst($attendance->status) }}</td>
                <td>
                    <a href="{{ route('teacherattendance.show', $attendance->id) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('teacherattendance.edit', $attendance->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('teacherattendance.destroy', $attendance->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure to delete this attendance?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center">No attendance records found for {{ $date }}.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    {{ $attendances->links() }}
</div>
@endsection
