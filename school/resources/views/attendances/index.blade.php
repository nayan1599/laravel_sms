@extends('layouts.layouts')

@section('content')
<div class="container">
    <h4>Attendance List</h4>
    <a href="{{ route('attendances.create') }}" class="btn btn-primary mb-3">Add Attendance</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Date</th>
                <th>Student</th>
                <th>Class</th>
                <th>Section</th>
                <th>Subject</th>
                <th>Status</th>
                <th>Remarks</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($attendances as $a)
            <tr>
                <td>{{ $a->attendance_date }}</td>
                <td>{{ $a->student->name ?? '' }}</td>
                <td>{{ $a->class->name ?? '' }}</td>
                <td>{{ $a->section->name ?? '' }}</td>
                <td>{{ $a->subject->name ?? '' }}</td>
                <td>{{ ucfirst($a->status) }}</td>
                <td>{{ $a->remarks }}</td>
                <td>
                    <a href="{{ route('attendances.edit', $a->id) }}" class="btn btn-sm btn-info">Edit</a>
                    <form action="{{ route('attendances.destroy', $a->id) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $attendances->links() }}
</div>
@endsection
