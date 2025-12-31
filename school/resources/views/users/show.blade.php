@extends('layouts.layouts')
@section('title', 'User Profile')
@section('content')
<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold main-title">👤 User Profile</h3>
       
    </div>

    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body">
            <div class="row align-items-center">

                {{-- Profile Photo --}}
                <div class="col-md-3 text-center mb-3 mb-md-0">
                    <img src="{{ asset($user->photo) }}"
                         class="rounded-circle img-thumbnail"
                         width="140" height="140"
                         alt="User Photo">
                </div>

                {{-- User Info --}}
                <div class="col-md-9">
                    <h4 class="fw-semibold mb-3">{{ $user->name }}</h4>

                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <strong>Email:</strong>
                            <div class="text-muted">{{ $user->email }}</div>
                        </div>

                        <div class="col-md-6 mb-2">
                            <strong>Phone:</strong>
                            <div class="text-muted">{{ $user->phone_number ?? 'N/A' }}</div>
                        </div>

                        <div class="col-md-6 mb-2">
                            <strong>Role:</strong>
                            <span class="badge bg-primary text-capitalize">
                                {{ $user->role }}
                            </span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- Student Information --}}
    @if($user->student)
    <div class="card shadow-sm border-0">
        <div class="card-header bg-light fw-semibold">
            🎓 Student Information
        </div>

        <div class="card-body">
            <div class="row">

                <div class="col-md-4 mb-3">
                    <strong>Roll / Enrollment No:</strong>
                    <div class="text-muted">{{ $user->student->roll }}</div>
                </div>

                <div class="col-md-4 mb-3">
                    <strong>Course:</strong>
                    <div class="text-muted">{{ $user->student->course }}</div>
                </div>

                <div class="col-md-4 mb-3">
                    <strong>Date of Birth:</strong>
                    <div class="text-muted">
                        {{ \Carbon\Carbon::parse($user->student->date_of_birth)->format('d M Y') }}
                    </div>
                </div>

                <div class="col-md-12">
                    <strong>Address:</strong>
                    <div class="text-muted">
                        {{ $user->student->address ?? 'N/A' }}
                    </div>
                </div>

            </div>
        </div>
    </div>
    @endif

</div>
@endsection
