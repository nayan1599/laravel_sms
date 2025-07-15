@extends('layouts.layouts')

@section('content')
<div class="container py-4">
    <h4>Date Range Attendance Report</h4>

    <form method="GET" action="{{ route('attendance.monthly') }}" class="row g-3 mb-4">
        <div class="col-md-3">
            <label class="form-label">Start Date</label>
            <input type="date" name="start_date" value="{{ $start ?? '' }}" class="form-control" required>
        </div>

        <div class="col-md-3">
            <label class="form-label">End Date</label>
            <input type="date" name="end_date" value="{{ $end ?? '' }}" class="form-control" required>
        </div>

        <div class="col-md-3">
            <label class="form-label">Class</label>
            <select name="class_id" class="form-select" required>
                <option value="">Select Class</option>
                @foreach ($classes as $class)
                    <option value="{{ $class->id }}" {{ ($classId ?? '') == $class->id ? 'selected' : '' }}>
                        {{ $class->class_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-3">
            <label class="form-label">Section</label>
            <select name="section_id" class="form-select" required>
                <option value="">Select Section</option>
                @foreach ($sections as $section)
                    <option value="{{ $section->id }}" {{ ($sectionId ?? '') == $section->id ? 'selected' : '' }}>
                        {{ $section->section_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-12">
            <button class="btn btn-primary">View Report</button>
        </div>
    </form>

    @if ($report->count())
        <table class="table table-bordered table-striped mt-4">
            <thead class="table-dark">
                <tr>
                    <th>Student Name</th>
                    <th>Total Attendance</th>
                    <th>Present</th>
                    <th>Absent</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($report as $r)
                    <tr>
                        <td>{{ $r['name'] }}</td>
                        <td>{{ $r['total'] }}</td>
                        <td class="text-success">{{ $r['present'] }}</td>
                        <td class="text-danger">{{ $r['absent'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @elseif(request()->has('start_date'))
        <div class="alert alert-warning mt-4">No data found in this date range.</div>
    @endif
</div>
@endsection
