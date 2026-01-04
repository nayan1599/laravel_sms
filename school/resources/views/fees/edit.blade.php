@extends('layouts.layouts')

@section('content')
<div class="container">
    <h2 class="main-title">Edit Fee Record</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('fees.update', $fee->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Student</label>
            <select name="student_id" class="form-select" required>
                <option value="">Select Student</option>
                @foreach($students as $student)
                    <option value="{{ $student->id }}" {{ (old('student_id', $fee->student_id) == $student->id) ? 'selected' : '' }}>
                        {{ $student->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Class</label>
            <select name="class_id" class="form-select" required>
                <option value="">Select Class</option>
                @foreach($classes as $class)
                    <option value="{{ $class->id }}" {{ (old('class_id', $fee->class_id) == $class->id) ? 'selected' : '' }}>
                        {{ $class->class_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Fee Type</label>
            <input type="text" name="fee_type" class="form-control" value="{{ old('fee_type', $fee->fee_type) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Amount</label>
            <input type="number" name="amount" step="0.01" class="form-control" value="{{ old('amount', $fee->amount) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Due Date</label>
            <input type="date" name="due_date" class="form-control" value="{{ old('due_date', $fee->due_date) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Payment Date</label>
            <input type="date" name="payment_date" class="form-control" value="{{ old('payment_date', $fee->payment_date ? $fee->payment_date->format('Y-m-d') : '') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Payment Status</label>
            <select name="payment_status" class="form-select" required>
                <option value="pending" {{ (old('payment_status', $fee->payment_status) == 'pending') ? 'selected' : '' }}>Pending</option>
                <option value="paid" {{ (old('payment_status', $fee->payment_status) == 'paid') ? 'selected' : '' }}>Paid</option>
                <option value="partial" {{ (old('payment_status', $fee->payment_status) == 'partial') ? 'selected' : '' }}>Partial</option>
                <option value="overdue" {{ (old('payment_status', $fee->payment_status) == 'overdue') ? 'selected' : '' }}>Overdue</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Paid Amount</label>
            <input type="number" name="paid_amount" step="0.01" class="form-control" value="{{ old('paid_amount', $fee->paid_amount) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Receipt Number</label>
            <input type="text" name="receipt_number" class="form-control" value="{{ old('receipt_number', $fee->receipt_number) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Remarks</label>
            <textarea name="remarks" class="form-control">{{ old('remarks', $fee->remarks) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update Fee</button>
        <a href="{{ route('fees.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
 