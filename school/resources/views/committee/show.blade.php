@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Committee Member Details</h3>

    <div class="card shadow-sm mt-3">
        <div class="card-body">
            <h4 class="card-title">{{ $schoolCommittee->name }}</h4>
            <p><strong>Designation:</strong> {{ $schoolCommittee->designation }}</p>
            <p><strong>Phone:</strong> {{ $schoolCommittee->phone ?? 'N/A' }}</p>
            <p><strong>Email:</strong> {{ $schoolCommittee->email ?? 'N/A' }}</p>
            <p><strong>Address:</strong> {{ $schoolCommittee->address ?? 'N/A' }}</p>
            <p><strong>Status:</strong> 
                <span class="badge bg-{{ $schoolCommittee->status == 'active' ? 'success' : 'secondary' }}">
                    {{ ucfirst($schoolCommittee->status) }}
                </span>
            </p>
            <p><strong>Added On:</strong> {{ $schoolCommittee->created_at->format('d M Y') }}</p>
        </div>
    </div>

    <a href="{{ route('school_committees.index') }}" class="btn btn-primary mt-3">← Back to List</a>
</div>
@endsection
