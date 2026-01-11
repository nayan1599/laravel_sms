@extends('layouts.app')

@section('title','Student Dashboard')

@section('content')
<div class="container-fluid py-4">

    {{-- Welcome --}}
    <div class="text-center mb-4">
        <h4 class="fw-bold">Welcome, {{ auth()->user()->name }}</h4>
        <small class="text-muted">Student Dashboard</small>
    </div>

    {{-- Summary Cards --}}
    <div class="row g-3 mb-4">

        <div class="col-md-3">
            <div class="card shadow-sm border-0 text-center">
                <div class="card-body">
                    <h6>Total Class Days</h6>
                    <h3 class="fw-bold">{{ $totalDays }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm border-0 text-center">
                <div class="card-body text-success">
                    <h6>Present</h6>
                    <h3 class="fw-bold">{{ $presentDays }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm border-0 text-center">
                <div class="card-body text-danger">
                    <h6>Absent</h6>
                    <h3 class="fw-bold">{{ $absentDays }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm border-0 text-center">
                <div class="card-body text-primary">
                    <h6>Attendance %</h6>
                    <h3 class="fw-bold">{{ $attendancePercentage }}%</h3>
                </div>
            </div>
        </div>

    </div>

    {{-- Today Attendance --}}
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card shadow-sm border-0">
                <div class="card-header fw-bold">
                    Today's Attendance
                </div>
                <div class="card-body text-center">
                    @if($todayAttendance)
                        @if($todayAttendance->status == 'present')
                            <span class="badge bg-success fs-6">Present</span>
                        @elseif($todayAttendance->status == 'absent')
                            <span class="badge bg-danger fs-6">Absent</span>
                        @else
                            <span class="badge bg-warning fs-6">Leave</span>
                        @endif
                    @else
                        <span class="badge bg-secondary fs-6">Not Taken Yet</span>
                    @endif
                </div>
            </div>
        </div>

        {{-- Leave Status --}}
        <div class="col-md-6">
            <div class="card shadow-sm border-0">
                <div class="card-header fw-bold">
                    Leave Application
                </div>
                <div class="card-body text-center">
                    <h5>Pending Requests</h5>
                    <h2 class="fw-bold text-warning">{{ $pendingLeaves }}</h2>
                </div>
            </div>
        </div>
    </div>

    {{-- Quick Actions --}}
    <div class="row">
        <div class="col-md-12 text-center">
            <a href="{{ route('student.attendance') }}" class="btn btn-outline-primary me-2">
                View Attendance
            </a>
            <a href="{{ route('student.create') }}" class="btn btn-outline-success">
                Apply Leave
            </a>
        </div>
    </div>

</div>
@endsection
