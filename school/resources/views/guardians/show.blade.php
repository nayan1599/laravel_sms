@extends('layouts.layouts')
@section('content')
<div class="container">
    <h2>Guardian Details</h2>
    <div class="card p-3">
        <p><strong>Name:</strong> {{ $guardian->user->full_name ?? 'N/A' }}</p>
        <p><strong>Relation:</strong> {{ ucfirst($guardian->relation) }}</p>
        <p><strong>Occupation:</strong> {{ $guardian->occupation }}</p>
        <p><strong>Education:</strong> {{ $guardian->education_level }}</p>
        <p><strong>Income:</strong> {{ $guardian->income_range }}</p>
        <p><strong>Status:</strong> {{ ucfirst($guardian->status) }}</p>
        <p><strong>Emergency Contact:</strong> {{ $guardian->emergency_contact ? 'Yes' : 'No' }}</p>
    </div>
</div>
@endsection
