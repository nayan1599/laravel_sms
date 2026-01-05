@extends('layouts.app')

@section('title', 'My Fees')

@section('content')
<div class="container-fluid py-4">

    {{-- Header --}}
    <div class="text-center">
        <p class="main-title mb-0">
            Student: {{ $student->name }}
        </p>
    </div>
    <div class="row mb-4">
        <div class="col-md-6">
            <h4 class="fw-bold main-title">💰 My Fee List</h4>

        </div>
        <div class="col-md-6 text-md-end mt-3 mt-md-0">
            <a href="{{ route('student.dashboard') }}" class="btn btn-sm btn-secondary">
                ← Back to Dashboard
            </a>
        </div>
    </div>

    {{-- Fee Table --}}
    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Fee Type</th>
                        <th>Amount</th>
                        <th>Expiry Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($fees as $fee)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $fee->fee_type }}</td>
                        <td>
                            <span class="fw-semibold">
                                {{ number_format($fee->amount, 2) }} ৳
                            </span>
                        </td>

                        <td>{{ \Carbon\Carbon::parse($fee->expiry_date)->format('d M Y') }}</td>
                        <td>
                            @if($fee->status === 'paid')
                            <span class="badge bg-success">Paid</span>
                            @elseif($fee->status === 'partial')
                            <span class="badge bg-warning">Partial</span>
                            @else
                            <span class="badge bg-danger">Due</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted py-4">
                            No fee records found.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection