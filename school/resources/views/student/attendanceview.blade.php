@extends('layouts.app')

@section('title','My Attendance')

@section('content')
<div class="container-fluid py-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h4 class="fw-bold mb-0">My Attendance</h4>
            <small class="text-muted">মাস অনুযায়ী আপনার উপস্থিতির তথ্য</small>
        </div>
    </div>

    {{-- Month Filter --}}
    <div class="card shadow-sm border-0 mb-3">
        <div class="card-body">
            <form method="GET" class="row g-3 align-items-center">
                <div class="col-md-4">
                    <label class="form-label">Select Month</label>
                    <input type="month" name="month" value="{{ $month }}" class="form-control">
                </div>
                <div class="col-md-2 mt-4">
                    <button class="btn btn-primary w-100">Filter</button>
                </div>
            </form>
        </div>
    </div>

    {{-- Attendance Table --}}
    <div class="card shadow-sm border-0">
        <div class="card-header fw-bold">
            Attendance List
        </div>
        <div class="card-body p-0">
            <table class="table table-bordered table-hover mb-0">
                <thead class="table-light">
                    <tr class="text-center">
                        <th>Date</th>
                        <th>Day</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($attendances as $attendance)
                        <tr class="text-center">
                            <td>{{ \Carbon\Carbon::parse($attendance->date)->format('d M Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($attendance->date)->format('l') }}</td>
                            <td>
                                @if($attendance->status == 'present')
                                    <span class="badge bg-success">Present</span>
                                @elseif($attendance->status == 'absent')
                                    <span class="badge bg-danger">Absent</span>
                                @else
                                    <span class="badge bg-warning text-dark">Leave</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center text-muted py-3">
                                No attendance record found
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
