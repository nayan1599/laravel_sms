@extends('layouts.app')

@section('title', 'My Leave Applications')

@section('content')
<div class="container-fluid py-4">

    {{-- Page Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-0 main-title">My Leave Applications</h4>
            <small class="text-muted">আপনার জমা দেওয়া সব ছুটির দরখাস্ত</small>
        </div>
        <a href="{{ route('leave.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Apply Leave
        </a>
    </div>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- Leave Table --}}
    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Leave Date</th>
                            <th>Reason</th>
                            <th>Status</th>
                            <th>Applied At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($leaves as $index => $leave)
                            <tr>
                                <td>{{ $index + 1 }}</td>

                                {{-- Leave Date --}}
                                <td>
                                    <span class="fw-semibold">
                                        {{ $leave->start_date->format('d M Y') }}
                                    </span>
                                    <br>
                                    <small class="text-muted">
                                        to {{ $leave->end_date->format('d M Y') }}
                                    </small>
                                </td>

                                {{-- Reason --}}
                                <td style="max-width: 300px;">
                                    {{ \Illuminate\Support\Str::limit($leave->reason, 60) }}
                                </td>

                                {{-- Status --}}
                                <td>
                                    @if($leave->status === 'pending')
                                        <span class="badge bg-warning text-dark">
                                            <i class="bi bi-clock"></i> Pending
                                        </span>
                                    @elseif($leave->status === 'approved')
                                        <span class="badge bg-success">
                                            <i class="bi bi-check-circle"></i> Approved
                                        </span>
                                    @else
                                        <span class="badge bg-danger">
                                            <i class="bi bi-x-circle"></i> Rejected
                                        </span>
                                    @endif
                                </td>

                                {{-- Applied Date --}}
                                <td>
                                    {{ $leave->applied_at?->format('d M Y') ?? $leave->created_at->format('d M Y') }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-4 text-muted">
                                    <i class="bi bi-inbox fs-3 d-block mb-2"></i>
                                    কোনো Leave Application পাওয়া যায়নি
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
