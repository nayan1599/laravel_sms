@extends('layouts.layouts')

@section('content')
<div class="container">
    <h2 class="main-title mb-4">Time Table List</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
<div class="text-end">
    <a class="btn btn-primary" href="{{ route('timetables.create') }}">Create</a>
</div>
    <table class="table table-bordered table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>Academic Year</th>
                <th>Class</th>
                <th>Day</th>
                <th>Period</th>
                <th>Subject</th>
                <th>Teacher</th>
                <th>Room</th>
                <th>Status</th>
                <th width="120">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($timetable as $routine)
            <tr>
                <td>{{ $routine->academicYear->name ?? 'N/A' }}</td>
                <td>{{ $routine->class->class_name ?? 'N/A' }}</td>

                <td>
                    @php
                        $days = ['Sun','Mon','Tue','Wed','Thu','Fri','Sat'];
                    @endphp
                    {{ $days[$routine->day_of_week - 1] ?? 'N/A' }}
                </td>

                <td>{{ $routine->period->name ?? 'N/A' }}</td>
                <td>{{ $routine->subject->subject_name ?? 'N/A' }}</td>
                <td>{{ $routine->teacher->name ?? 'N/A' }}</td>
                <td>{{ $routine->room->room_name ?? '-' }}</td>

                <td>
                    @if($routine->is_active)
                        <span class="badge bg-success">Active</span>
                    @else
                        <span class="badge bg-danger">Inactive</span>
                    @endif
                </td>

                <td>
                    <a href="{{ route('timetables.edit', $routine->id) }}" class="btn btn-sm btn-warning">Edit</a>

                    <form action="{{ route('timetables.destroy', $routine->id) }}" 
                          method="POST" 
                          style="display:inline-block">
                        @csrf 
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" 
                                onclick="return confirm('Delete this routine?')">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="9" class="text-center text-muted">
                    No timetable data found.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
