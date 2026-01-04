@extends('layouts.layouts')
@section('title','Student Invoice')
@section('content')
<div class="container my-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0 main-title">Fee Invoice</h2>
        
        <button class="btn btn-success no-print" onclick="printInvoice('printArea')">Print</button>
    </div>


    
    <div class="card shadow border-0 p-3" style="width: 100%;" id="printArea">
        {{-- Header --}}
        <div class="card-header bg-white text-center border-bottom">
            <h2 class="fw-bold mb-0">{{ $org_settings->organization_name }}</h2>
            <small class="text-muted">
                {{ $org_settings->address }} <br>
                Phone: {{ $org_settings->phone }} | Email: {{ $org_settings->email }}
            </small>
        </div>

        {{-- Invoice Body --}}
        <div class="card-body">

            {{-- Title --}}
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-semibold text-primary mb-0">Fee Invoice</h4>
                <span class="badge bg-secondary px-3 py-2">
                    Invoice #{{ $fee->receipt_number }}
                </span>
            </div>

            {{-- Student & Invoice Info --}}
            <div class="row mb-4 px-3 py-2">
                <div class="col-md-6">
                    <h6 class="fw-bold mb-2">Student Information</h6>
                    <p class="mb-1"><strong>Name:</strong> {{ $fee->student->name ?? 'N/A' }}</p>
                    <p class="mb-1"><strong>Class:</strong> {{ $fee->class->class_name ?? 'N/A' }}</p>
                    <p class="mb-0"><strong>Roll:</strong> {{ $fee->student->roll ?? 'N/A' }}</p>
                </div>

                <div class="col-md-6 text-md-end mt-3 mt-md-0">
                    <h6 class="fw-bold mb-2">Invoice Details</h6>
                    <p class="mb-1"><strong>Issue Date:</strong> {{ $fee->created_at->format('d M Y') }}</p>
                    <p class="mb-0">
                        <strong>Due Date:</strong>
                        {{ \Carbon\Carbon::parse($fee->due_date)->format('d M Y') }}
                    </p>
                </div>
            </div>

            {{-- Fee Table --}}
            <div class="table-responsive">
                <table class="table table-bordered align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Description</th>
                            <th class="text-end" style="width: 150px;">Amount (৳)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $fee->fee_type }}</td>
                            <td class="text-end">{{ number_format($fee->amount, 2) }}</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th class="text-end">Total</th>
                            <th class="text-end">{{ number_format($fee->amount, 2) }}</th>
                        </tr>
                    </tfoot>
                </table>
            </div>

            {{-- Status & Remarks --}}
            <div class="row mt-4">
                <div class="col-md-6">
                    <p class="mb-1"><strong>Payment Status:</strong></p>
                    @php
                    $statusClass = [
                    'pending' => 'warning',
                    'paid' => 'success',
                    'partial' => 'info',
                    'overdue' => 'danger',
                    ];
                    @endphp
                    <span class="badge bg-{{ $statusClass[$fee->payment_status] ?? 'secondary' }} px-3 py-2">
                        {{ ucfirst($fee->payment_status) }}
                    </span>
                </div>

                <div class="col-md-6 mt-3 mt-md-0">
                    <p class="mb-1"><strong>Remarks:</strong></p>
                    <p class="text-muted mb-0">{{ $fee->remarks ?? 'N/A' }}</p>
                </div>
            </div>

        </div>

        {{-- Footer --}}
        <div class="card-footer bg-white text-center border-top">
            <small class="text-muted">
                This is a computer generated invoice. No signature required.
            </small>

        </div>

    </div>


    <div class="py-3 text-end">
        <a href="{{ route('fees.index') }}" class="btn btn-secondary">Back to Fees List</a>
    </div>


</div>


@endsection