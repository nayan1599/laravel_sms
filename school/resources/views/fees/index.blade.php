<style>
.icon-shape{
    width:55px;
    height:55px;
    display:flex;
    align-items:center;
    justify-content:center;
}
</style>

@extends('layouts.layouts')
@section('title','Fees List')

@section('content')
<div class="container-fluid">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="main-title mb-0">Fees List</h3>
        <a href="{{ route('fees.create') }}" class="btn btn-success">
            + Add Fee
        </a>
    </div>

    {{-- Success --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Fee Table --}}
    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-bordered table-hover table-striped mb-0 align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Student</th>
                        <th>Fee Type</th>
                        <th>Month</th>
                        <th>Due Date</th>
                        <th>Status</th>
                        <th>Due Amount</th>
                        <th>Paid Amount</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($fees as $index => $fee)
                        <tr>
                            <td>{{ $index + 1 }}</td>

                            <td>
                                {{ $fee->student->name ?? 'N/A' }}
                            </td>

                            <td>
                                {{ $fee->feeType->name ?? 'N/A' }}
                            </td>

                            <td>
                                {{ $fee->month_year }}
                            </td>

                            <td>
                                {{ \Carbon\Carbon::parse($fee->due_date)->format('d M Y') }}
                            </td>

                            <td>
                                @php
                                    $statusClass = [
                                        'PENDING' => 'badge bg-warning text-dark',
                                        'PARTIAL' => 'badge bg-info text-dark',
                                        'PAID'    => 'badge bg-success',
                                        'OVERDUE' => 'badge bg-danger',
                                    ];
                                @endphp

                                <span class="{{ $statusClass[$fee->status] ?? 'badge bg-secondary' }}">
                                    {{ ucfirst(strtolower($fee->status)) }}
                                </span>
                            </td>

                            <td>
                                ৳ {{ number_format($fee->amount_due, 2) }}
                            </td>

                            <td>
                                ৳ {{ number_format($fee->amount_paid, 2) }}
                            </td>

                            <td>
                                <a href="{{ route('fees.edit', $fee->id) }}"
                                   class="btn btn-sm btn-warning
                                   {{ $fee->status === 'PAID' ? 'disabled' : '' }}">
                                    Edit
                                </a>

                                <a href="{{ route('fees.invoice', $fee->id) }}"
                                   class="btn btn-sm btn-info">
                                    Invoice
                                </a>

                                <form action="{{ route('fees.destroy', $fee->id) }}"
                                      method="POST"
                                      class="d-inline-block"
                                      onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center py-4">
                                No fee records found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Pagination --}}
    <div class="mt-3">
        {{ $fees->links() }}
    </div>

</div>
@endsection
