@extends('layouts.app')

@section('title', 'View Leave Application')

@section('content')
<div class="container-fluid py-4">

    {{-- Page Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-0 main-title">Leave Application Details</h4>
            <small class="text-muted">আপনার ছুটির দরখাস্তের বিস্তারিত তথ্য</small>
        </div>
        <a href="{{ route('leave.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Back
        </a>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card border-0 shadow-sm">
                <div class="card-body">

                    {{-- Status --}}
                    <div class="mb-3 text-end">
                        @if($leave->status === 'pending')
                            <span class="badge bg-warning text-dark px-3 py-2">
                                <i class="bi bi-clock"></i> Pending
                            </span>
                        @elseif($leave->status === 'approved')
                            <span class="badge bg-success px-3 py-2">
                                <i class="bi bi-check-circle"></i> Approved
                            </span>
                        @else
                            <span class="badge bg-danger px-3 py-2">
                                <i class="bi bi-x-circle"></i> Rejected
                            </span>
                        @endif
                    </div>

                    <hr>

                    {{-- Leave Date --}}
                    <div class="row mb-3">
                        <div class="col-md-4 fw-semibold">Leave Period</div>
                        <div class="col-md-8">
                            {{ \Carbon\Carbon::parse($leave->from_date)->format('d M Y') }}
                            <span class="mx-1">to</span>
                            {{ \Carbon\Carbon::parse($leave->to_date)->format('d M Y') }}
                        </div>
                    </div>

                    {{-- Total Days --}}
                    <div class="row mb-3">
                        <div class="col-md-4 fw-semibold">Total Days</div>
                        <div class="col-md-8">
                            {{ \Carbon\Carbon::parse($leave->from_date)->diffInDays($leave->to_date) + 1 }} day(s)
                        </div>
                    </div>

                    {{-- Reason --}}
                    <div class="row mb-3">
                        <div class="col-md-4 fw-semibold">Reason</div>
                        <div class="col-md-8">
                            <div class="border rounded p-3 bg-light">
                                {{ $leave->reason }}
                            </div>
                        </div>
                    </div>

                    {{-- Applied Date --}}
                    <div class="row mb-3">
                        <div class="col-md-4 fw-semibold">Applied At</div>
                        <div class="col-md-8">
                            {{ $leave->created_at->format('d M Y, h:i A') }}
                        </div>
                    </div>

                    {{-- Teacher Comment --}}
                    @if($leave->teacher_comment)
                        <div class="row mb-3">
                            <div class="col-md-4 fw-semibold">Teacher Comment</div>
                            <div class="col-md-8">
                                <div class="alert alert-info mb-0">
                                    {{ $leave->teacher_comment }}
                                </div>
                            </div>
                        </div>
                    @endif

                    {{-- Action --}}
                    @if($leave->status === 'pending')
                        <div class="text-end mt-4">
                            <a href="{{ route('leave.edit', $leave->id) }}"
                               class="btn btn-primary">
                                <i class="bi bi-pencil-square"></i> Edit Application
                            </a>
                        </div>
                    @endif

                </div>
            </div>

        </div>
    </div>

</div>
@endsection
