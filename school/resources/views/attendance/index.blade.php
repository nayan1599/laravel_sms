@extends('layouts.layouts')

@section('content')
<div class="container">
    <h2>Attendance List</h2>
    <a href="{{ route('attendance.create') }}" class="btn btn-primary mb-3">Take Attendance</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
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
                <tr>
                    <td>{{ $entry->attendance_date }}</td>
                    <td>{{ $entry->student->name ?? 'N/A' }}</td>
                    <td>{{ $entry->class->class_name ?? 'N/A' }}</td>
                    <td>{{ $entry->section->section_name ?? 'N/A' }}</td>
                    <td>{{ $entry->subject->subject_name ?? 'N/A' }}</td>
                    <td>{{ ucfirst($entry->status) }}</td>
                    <td>{{ $entry->remarks }}</td>
                    <td>{{ $entry->recordedBy->name ?? 'N/A' }}</td>
                    <td>
                        <form action="{{ route('attendance.destroy', $entry->id) }}" method="POST">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $attendance->links() }}
</div>
@endsection
