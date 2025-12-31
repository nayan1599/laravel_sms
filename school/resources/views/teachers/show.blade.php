@extends('layouts.layouts')

@section('content')
<div class="container">
    <h2>Teacher Details</h2>

    <div class="card mt-3">
        <div class="card-body">
            <h5>{{ $teacher->user->name ?? 'N/A' }}</h5>
            <p><strong>Employee ID:</strong> {{ $teacher->employee_id }}</p>
            <p><strong>Designation:</strong> {{ $teacher->designation }}</p>
            <p><strong>Department:</strong> {{ $teacher->department ?? '-' }}</p>
            <p><strong>Qualification:</strong> {{ $teacher->qualification ?? '-' }}</p>
            <p><strong>Experience:</strong> {{ $teacher->experience_years }} years</p>
            <p><strong>Joined:</strong> {{ $teacher->date_of_joining }}</p>
            <p><strong>Subject Specialization:</strong> {{ $teacher->subject_specialization ?? '-' }}</p>
            <p><strong>Salary:</strong> ৳{{ $teacher->salary }}</p>
            <p><strong>Employment Type:</strong> {{ ucfirst($teacher->employment_type) }}</p>
            <p><strong>Blood Group:</strong> {{ $teacher->blood_group ?? '-' }}</p>
            <p><strong>Emergency Contact:</strong> {{ $teacher->emergency_contact_name }} ({{ $teacher->emergency_contact_phone }})</p>
            <p><strong>Status:</strong> {{ ucfirst($teacher->status) }}</p>
        </div>
    </div>

    <a href="{{ route('teachers.edit', $teacher->id) }}" class="btn btn-warning mt-3">Edit</a>
    <a href="{{ route('teachers.index') }}" class="btn btn-secondary mt-3">Back to List</a>
</div>
@endsection
