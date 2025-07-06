@extends('layouts.layouts')

@section('content')
<div class="container">
    <h3>Student Details</h3>
    <hr>

    <p><strong>Name:</strong> {{ $student->name }}</p>
    <p><strong>Email:</strong> {{ $student->email ?? 'N/A' }}</p>
    <p><strong>Phone:</strong> {{ $student->phone ?? 'N/A' }}</p>
    <p><strong>Date of Birth:</strong> {{ $student->dob ?? 'N/A' }}</p>
    <p><strong>Gender:</strong> {{ ucfirst($student->gender) ?? 'N/A' }}</p>
    <p><strong>Class:</strong> {{ $student->studentClass->class_name ?? 'N/A' }}</p>
    <p><strong>Section:</strong> {{ $student->section->section_name ?? 'N/A' }}</p>
    <p><strong>Roll:</strong> {{ $student->roll ?? 'N/A' }}</p>
    <p><strong>Address:</strong> {{ $student->address ?? 'N/A' }}</p>

    @if($student->photo)
        <p><strong>Photo:</strong><br>
        <img src="{{ asset($student->photo) }}" width="120" class="mt-2"></p>
    @endif

    <a href="{{ route('students.index') }}" class="btn btn-secondary mt-3">Back to List</a>
</div>
@endsection
