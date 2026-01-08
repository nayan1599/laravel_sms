@extends('layouts.app')

@section('title','View Student Attendance')

@section('content')
<div class="container py-4">

    <div class="card shadow">
        <div class="card-header bg-info text-white">
            <h5 class="mb-0"><i class="bi bi-eye me-1"></i> Attendance Details</h5>
        </div>

        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Student</th>
                    <td>{{ $attendance->student->name }}</td>
                </tr>
                <tr>
                    <th>Class / Section</th>
                    <td>{{ $attendance->class->class_name ?? '-' }} / {{ $attendance->section->section_name ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Subject</th>
                    <td>{{ $attendance->subject->subject_name ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>
                        @php
                            $status = $attendance->status;
                            $color = match($status) {
                                'present' => 'success',
                                'absent' => 'danger',
                                'late' => 'warning',
                                'leave' => 'info',
                                default => 'secondary'
                            };
                        @endphp
                        <span class="badge bg-{{ $color }}">{{ ucfirst($status) }}</span>
                    </td>
                </tr>
                <tr>
                    <th>Remarks</th>
                    <td>{{ $attendance->remarks ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Recorded By</th>
                    <td>{{ $attendance->recorder->name ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Attendance Date</th>
                    <td>{{ $attendance->attendance_date }}</td>
                </tr>
                <tr>
                    <th>Recorded At</th>
                    <td>{{ $attendance->recorded_at }}</td>
                </tr>
            </table>
        </div>

        <div class="card-footer text-end">
            <a href="{{ route('attendance.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>

</div>
@endsection
