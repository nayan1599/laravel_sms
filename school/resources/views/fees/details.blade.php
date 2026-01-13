@extends('layouts.app')
@section('title', 'Fee Details')
@section('content')
<div class="container-fluid py-4">
    <div class="mb-4">
        <h4 class="fw-bold">

            — Class {{ $fees->first()->class->name ?? '' }}
        </h4>
        <small class="text-muted">All fee records</small>
    </div>

    <!-- Filter Form -->
    <form method="GET"
        action="{{ route('fees.details', [
            'feeType' => request()->route('feeType'),
            'class'   => request()->route('class')
      ]) }}"
        class="row g-3 mb-4">

        <div class="col-md-4">
            <input type="text"
                name="search"
                value="{{ request('search') }}"
                class="form-control"
                placeholder="Student name search করুন">
        </div>

        <div class="col-md-2">
            <button class="btn btn-primary w-100">
                🔍 Search
            </button>
        </div>
    </form>


    <div class="shadow">
        <div class="card-body">
            <table class="table table-bordered table-hover table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Student</th>
                        <th>Class</th>
                        <th>Fee Type</th>
                        <th>Payment Date</th>
                        <th>Status</th>
                        <th>Paid Amount</th>
                        <th>Receipt No.</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($fees as $index => $fee)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $fee->student->name ?? 'N/A' }}</td>
                        <td>{{ $fee->class->class_name ?? 'N/A' }}</td>
                        <td>{{ $fee->fee_type }}</td>
                        <td>{{ $fee->payment_date ? \Carbon\Carbon::parse($fee->payment_date)->format('d M Y') : '-' }}</td>
                        <td>
                            @php
                            $statusClass = [
                            'pending' => 'badge bg-warning text-dark',
                            'paid' => 'badge bg-success',
                            'partial' => 'badge bg-info text-dark',
                            'overdue' => 'badge bg-danger',
                            ];
                            @endphp
                            <span class="{{ $statusClass[$fee->payment_status] ?? 'badge bg-secondary' }}">
                                {{ ucfirst($fee->payment_status) }}
                            </span>
                        </td>
                        <td>{{ number_format($fee->paid_amount, 2) }}</td>
                        <td>{{ $fee->receipt_number ?? '-' }}</td>
                        <td>
                            @php if(($fee->payment_status == 'paid')){
                            $disabled = 'disabled';
                            } else {
                            $disabled = '';
                            } @endphp


                            <a href="{{ route('fees.edit', $fee->id) }}" class="btn btn-sm btn-warning {{ $disabled }}">Edit</a>

                            <a href="{{ route('fees.invoice',$fee->id) }}" class="btn btn-sm btn-info"> Invoice</a>

                            <form action="{{ route('fees.destroy', $fee->id) }}" method="POST" class="d-inline-block"
                                onsubmit="return confirm('Are you sure you want to delete this fee record?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="12" class="text-center">No fee records found.</td>
                    </tr>
                    @endforelse
                </tbody>


            </table>




        </div>
    </div>

    <div class="py-3 text-end">
        <a href="{{ route('fees.index') }}" class="btn btn-secondary">Back to Fees List</a>
    </div>
</div>
@endsection