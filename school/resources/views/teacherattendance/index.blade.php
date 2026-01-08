@extends('layouts.app')

@section('title', 'Teacher Attendance List')

@section('content')
<div class="container">
    <div class="card shadow">
        <div class="card-header bg-primary text-white d-flex justify-content-between">
            <h5 class="mb-0">Teacher Attendance</h5>
            <a href="{{ route('teacherattendance.create') }}" class="btn btn-light btn-sm">
                + Take Attendance
            </a>
        </div>

        <div class="card-body">

            {{-- Date Filter --}}
            <form method="GET" class="row mb-3">
                <div class="col-md-4">
                    <input type="date" name="date" class="form-control"
                           value="{{ $date }}">
                </div>
                <div class="col-md-2">
                    <button class="btn btn-primary">Filter</button>
                </div>
            </form>

            {{-- Success --}}
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table class="table table-bordered text-center">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Teacher</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th width="160">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($attendances as $key => $attendance)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $attendance->teacher->name }}</td>
                        <td>{{ $attendance->attendance_date }}</td>
                        <td>
                            <span class="badge 
                                {{ $attendance->status == 'present' ? 'bg-success' : 'bg-danger' }}">
                                {{ ucfirst($attendance->status) }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('teacherattendance.show', $attendance->id) }}"
                               class="btn btn-info btn-sm">View</a>

                            <form action="{{ route('teacherattendance.destroy', $attendance->id) }}"
                                  method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Delete?')"
                                        class="btn btn-danger btn-sm">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5">No attendance found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            {{ $attendances->links() }}
        </div>
    </div>
</div>
@endsection
