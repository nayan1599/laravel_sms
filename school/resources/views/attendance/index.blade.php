@extends('layouts.app')

@section('title','Student Attendance')

@section('content')
<div class="container py-4">

    <div class="card shadow">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><i class="bi bi-journal-check me-1"></i> Student Attendance</h5>
            <a href="{{ route('attendance.create') }}" class="btn btn-light btn-sm">
                <i class="bi bi-plus-circle"></i> Add Attendance
            </a>
        </div>

        <div class="card-body">

            {{-- Filter by Date --}}
            <form method="GET" class="row mb-3">
                <div class="col-md-3">
                    <input type="date" name="date" class="form-control" value="{{ $date }}">
                </div>
                <div class="col-md-2">
                    <button class="btn btn-primary">Filter</button>
                </div>
            </form>

            {{-- Success Message --}}
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="table-responsive">
                <table class="table table-hover align-middle text-center">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Student</th>
                            <th>Class / Section</th>
                            <th>Subject</th>
                            <th>Status</th>
                            <th>Remarks</th>
                            <th>Recorded By</th>
                            <th>Date</th>
                            <th width="160">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($attendances as $key => $attendance)
                        <tr>
                            <td>{{ $attendances->firstItem() + $key }}</td>
                            <td class="text-start">{{ $attendance->student->name }}</td>
                            <td>
                                {{ $attendance->class->class_name ?? '-' }}
                                /
                                {{ $attendance->section->section_name ?? '-' }}
                            </td>
                            <td>{{ $attendance->subject->subject_name ?? '-' }}</td>
                            <td>
                                @php
                                    $status = $attendance->status;
                                    $color = match($status) {
                                        'present' => 'success',
                                        'absent' => 'danger',
                                        'late'   => 'warning',
                                        'leave'  => 'info',
                                        default => 'secondary'
                                    };
                                @endphp
                                <span class="badge bg-{{ $color }}">
                                    {{ ucfirst($status) }}
                                </span>
                            </td>
                            <td>{{ $attendance->remarks ?? '-' }}</td>
                            <td>{{ $attendance->recorder->name ?? '-' }}</td>
                            <td>{{ $attendance->attendance_date }}</td>
                            <td>
                                <a href="{{ route('attendance.show', $attendance->id) }}"
                                   class="btn btn-outline-info btn-sm">View</a>

                                <a href="{{ route('attendance.edit', $attendance->id) }}"
                                   class="btn btn-outline-warning btn-sm">Edit</a>

                                <form action="{{ route('attendance.destroy', $attendance->id) }}"
                                      method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Are you sure?')"
                                            class="btn btn-outline-danger btn-sm">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9">
                                <div class="py-4 text-muted">
                                    <i class="bi bi-clipboard-x fs-1"></i>
                                    <p class="mt-2 mb-0">No attendance records found for this date.</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            <div class="d-flex justify-content-end mt-3">
                {{ $attendances->links() }}
            </div>
        </div>
    </div>

</div>
@endsection
