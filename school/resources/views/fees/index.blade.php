@extends('layouts.layouts')

@section('content')
<div class="container">
    <h2 class="mb-4">Fees List</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('fees.create') }}" class="btn btn-success mb-3">+ Add Fee</a>

    <div class="card shadow">
        <div class="card-body">
            <table class="table table-bordered table-hover table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Student</th>
                        <th>Class</th>
                        <th>Fee Type</th>
                        <th>Amount</th>
                        <th>Due Date</th>
                        <th>Payment Date</th>
                        <th>Status</th>
                        <th>Paid Amount</th>
                        <th>Receipt No.</th>
                        <th>Remarks</th>
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
                        <td>{{ number_format($fee->amount, 2) }}</td>
                        <td>{{ \Carbon\Carbon::parse($fee->due_date)->format('d M Y') }}</td>
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
                        <td>{{ $fee->remarks ?? '-' }}</td>
                        <td>
                            <a href="{{ route('fees.edit', $fee->id) }}" class="btn btn-sm btn-warning">Edit</a>

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

            <div class="mt-3">
                {{ $fees->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
