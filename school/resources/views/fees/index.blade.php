@extends('layouts.layouts')

@section('content')
<div class="container">
    <h2 class="mb-4 main-title">Fees List</h2>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Filter Form -->
    <form method="GET" action="{{ route('fees.index') }}" class="row g-3 mb-4">
        <div class="col-md-3">
            <input type="text" name="student_name" class="form-control" placeholder="Student Name" value="{{ request('student_name') }}">
        </div>
        <div class="col-md-2">
            <select name="class_id" class="form-select">
                <option value="">All Classes</option>
                @foreach($classes as $class)
                <option value="{{ $class->id }}" {{ request('class_id') == $class->id ? 'selected' : '' }}>{{ $class->class_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-2">
            <select name="status" class="form-select">
                <option value="">All Status</option>
                <option value="paid" {{ request('status') == 'paid' ? 'selected' : '' }}>Paid</option>
                <option value="partial" {{ request('status') == 'partial' ? 'selected' : '' }}>Partial</option>
                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="overdue" {{ request('status') == 'overdue' ? 'selected' : '' }}>Overdue</option>
            </select>
        </div>
        <div class="col-md-2">
            <input type="month" name="month" class="form-control" value="{{ request('month') }}">
        </div>
        <div class="col-md-3">
            <button type="submit" class="btn btn-primary">Filter</button>
            <a href="{{ route('fees.index') }}" class="btn btn-secondary">Reset</a>
        </div>
    </form>

    <!-- Action Buttons -->
    <div class="mb-3">
        <a href="{{ route('fees.create') }}" class="btn btn-success">+ Add Fee</a>

    </div>

    <!-- Fee Table -->
    <div class="shadow">
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

                @if($fees->count())
                <tfoot>
                    <tr class="table-info fw-bold">
                        <td colspan="4">Total</td>
                        <td>{{ number_format($fees->sum('amount'), 2) }} ৳</td>
                        <td colspan="2"></td>
                        <td></td>
                        <td>{{ number_format($fees->sum('paid_amount'), 2) }} ৳</td>
                        <td colspan="3"></td>
                    </tr>
                </tfoot>
                @endif
            </table>

            <!-- Pagination -->
            <div class="mt-3">
                {{ $fees->links() }}
            </div>


        </div>
    </div>
</div>



 



@endsection