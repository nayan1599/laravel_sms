@extends('layouts.layouts')

@section('content')
<div class="container">
    <h2 class="main-title">Attendance List</h2>
    <a href="{{ route('attendance.create') }}" class="btn btn-success mb-3">Take Attendance</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Search Form --}}
    <form method="GET" action="{{ route('attendance.index') }}" class="row g-3 mb-4">
        <div class="col-md-3">
            <input type="date" name="date" value="{{ request('date') }}" class="form-control" placeholder="Date">
        </div>
        <div class="col-md-3">
            <input type="text" name="student_name" value="{{ request('student_name') }}" class="form-control" placeholder="Student Name">
        </div>
        <div class="col-md-3">
            <select name="class_id" class="form-select">
                <option value="">Select Class</option>
                @foreach($classes as $class)
                    <option value="{{ $class->id }}" {{ request('class_id') == $class->id ? 'selected' : '' }}>{{ $class->class_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3 d-grid">
            <button type="submit" class="btn btn-info">Search</button>
        </div>
    </form>

    <table class="table table-bordered table-striped align-middle">
        <thead>
            <tr>
                <th>Date</th>
                <th>Student</th>
                <th>Class</th>
                <th>Section</th>
                <th>Subject</th>
                <th>Status</th>
                <th>Remarks</th>
                <th>Recorded By</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($attendance as $entry)
                <tr data-id="{{ $entry->id }}">
                    <td>{{ $entry->attendance_date }}</td>
                    <td>{{ $entry->student->name ?? 'N/A' }}</td>
                    <td>{{ $entry->class->class_name ?? 'N/A' }}</td>
                    <td>{{ $entry->section->section_name ?? 'N/A' }}</td>
                    <td>{{ $entry->subject->subject_name ?? 'N/A' }}</td>
                    <td class="status-cell">
                        <span class="status-text">{{ ucfirst($entry->status) }}</span>
                    
                    </td>
                    <td>{{ $entry->remarks }}</td>
                    <td>{{ $entry->recordedBy->name ?? 'N/A' }}</td>
                    <td>
                        <form action="{{ route('attendance.destroy', $entry->id) }}" method="POST" onsubmit="return confirm('Are you sure to delete?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $attendance->links() }}
</div>
@endsection
 