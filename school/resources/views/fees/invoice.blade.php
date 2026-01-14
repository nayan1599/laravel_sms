@extends('layouts.layouts')
@section('title','Student Fee Invoice')
@section('content')
<div class="container my-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0 main-title">Fee Invoice</h2>
        <button class="btn btn-success no-print" onclick="printInvoice('printArea')">
            <i class="bi bi-printer"></i> Print
        </button>
    </div>

    <div class="card shadow border-0 p-5" id="printArea">
        <div class="p-5">
            {{-- Organization Header --}}
            <div class="text-center mb-4">
                <h2 class="fw-bold">{{ $org_settings->organization_name }}</h2>
                <small class="text-muted">
                    {{ $org_settings->address }} <br>
                    Phone: {{ $org_settings->phone }} | Email: {{ $org_settings->email }}
                </small>
            </div>

            {{-- Invoice Info --}}
            <div class="row mb-4">
                <div class="col-md-6">
                    <h6 class="fw-bold mb-2">Student Information</h6>
                    <p class="mb-1"><strong>Name:</strong> {{ $fee->student->name ?? 'N/A' }}</p>
                    <p class="mb-1"><strong>Class:</strong> {{ $fee->class->class_name ?? 'N/A' }}</p>
                    <p class="mb-1"><strong>Roll:</strong> {{ $fee->student->roll ?? 'N/A' }}</p>
                </div>
                <div class="col-md-6 text-md-end mt-3 mt-md-0">
                    <h6 class="fw-bold mb-2">Invoice Details</h6>
                    <p class="mb-1"><strong>Invoice #:</strong> {{ $fee->transaction_id }}</p>
                    <p class="mb-1"><strong>Issue Date:</strong> {{ $fee->created_at}}</p>
                    <p class="mb-1"><strong>Due Date:</strong> {{ \Carbon\Carbon::parse($fee->due_date)->format('d M Y') }}</p>
                    <p class="mb-0"><strong>Month:</strong> {{ $fee->month_year }}</p>
                </div>
            </div>



            {{-- Fee Table --}}
            <div class="table-responsive mb-3">
                <table class="table table-bordered align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Description</th>
                            <th class="text-end" style="width: 150px;">Amount (৳)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $fee->feeType->name ?? $fee->fee_type }}</td>
                            <td class="text-end">{{ number_format($fee->amount_due, 2) }}</td>
                        </tr>
                        @if($fee->discount > 0)
                        <tr>
                            <td>Discount</td>
                            <td class="text-end">- {{ number_format($fee->discount, 2) }}</td>
                        </tr>
                        @endif
                        @if($fee->fine > 0)
                        <tr>
                            <td>Fine</td>
                            <td class="text-end">+ {{ number_format($fee->fine, 2) }}</td>
                        </tr>
                        @endif
                    </tbody>
                    <tfoot class="table-light">
                        <tr>
                            <th class="text-end">Total</th>
                            <th class="text-end">{{ number_format($fee->amount_paid, 2) }}</th>

                        </tr>
                        <tr>
                            <th class="text-end">Amount Paid</th>
                            <th class="text-end">
                                {{ number_format($fee->amount_due - $fee->discount + $fee->fine, 2) }}
                            </th>
                        </tr>

                    </tfoot>
                </table>
            </div>

            {{-- Payment Info --}}
            <div class="row mt-3">
                <div class="col-md-4">
                    <p class="mb-1"><strong>Status:</strong></p>
                    @php
                    $statusClass = [
                    'PENDING' => 'warning',
                    'PARTIAL' => 'info',
                    'PAID' => 'success',
                    'OVERDUE' => 'danger',
                    ];
                    @endphp
                    <span class="badge bg-{{ $statusClass[$fee->status] ?? 'secondary' }} px-3 py-2">
                        {{ ucfirst(strtolower($fee->status)) }}
                    </span>
                </div>

                <div class="col-md-4">
                    <p class="mb-1"><strong>Payment Method:</strong></p>
                    <span>{{ $fee->payment_method ?? 'N/A' }}</span>
                </div>

                <div class="col-md-4">
                    <p class="mb-1"><strong>Transaction ID:</strong></p>
                    <span>{{ $fee->transaction_id ?? 'N/A' }}</span>
                </div>
            </div>

            {{-- Remarks --}}
            <div class="row mt-3">
                <div class="col-12">
                    <p class="mb-1"><strong>Remarks:</strong></p>
                    <p class="text-muted">{{ $fee->remarks ?? 'N/A' }}</p>
                </div>
            </div>

            {{-- Footer --}}
            <div class="text-center mt-4">
                <small class="text-muted">
                    This is a system generated invoice. No signature required.
                </small>
            </div>
        </div>
    </div>

    <div class="py-3 text-end no-print">
        <a href="{{ route('fees.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left-circle"></i> Back to Fees List
        </a>
    </div>
</div>

@endsection