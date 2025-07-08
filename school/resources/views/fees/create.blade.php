@extends('layouts.layouts')

@section('content')
<div class="container">
    <h2>Add New Fee</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('fees.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Student</label>
            <select name="student_id" class="form-control" required>
                <option value="">Select Student</option>
                @foreach($students as $student)
                    <option value="{{ $student->id }}" {{ old('student_id') == $student->id ? 'selected' : '' }}>
                        {{ $student->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Class</label>
            <select name="class_id" class="form-control" required>
                <option value="">Select Class</option>
                @foreach($classes as $class)
                    <option value="{{ $class->id }}" {{ old('class_id') == $class->id ? 'selected' : '' }}>
                        {{ $class->class_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Fee Type</label>
            <input type="text" name="fee_type" class="form-control" value="{{ old('fee_type') }}" required>
        </div>

        <div class="mb-3">
            <label>Amount</label>
            <input type="number" name="amount" step="0.01" class="form-control" value="{{ old('amount') }}" required>
        </div>

        <div class="mb-3">
            <label>Due Date</label>
            <input type="date" name="due_date" class="form-control" value="{{ old('due_date') }}" required>
        </div>

        <div class="mb-3">
            <label>Payment Date</label>
            <input type="date" name="payment_date" class="form-control" value="{{ old('payment_date') }}">
        </div>

        <div class="mb-3">
            <label>Payment Status</label>
            <select name="payment_status" class="form-control" required>
                <option value="pending" {{ old('payment_status') == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="paid" {{ old('payment_status') == 'paid' ? 'selected' : '' }}>Paid</option>
                <option value="partial" {{ old('payment_status') == 'partial' ? 'selected' : '' }}>Partial</option>
                <option value="overdue" {{ old('payment_status') == 'overdue' ? 'selected' : '' }}>Overdue</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Paid Amount</label>
            <input type="number" name="paid_amount" step="0.01" class="form-control" value="{{ old('paid_amount', 0) }}">
        </div>

        <div class="mb-3">
            <label>Receipt Number</label>
            <input type="text" name="receipt_number" class="form-control" value="{{ old('receipt_number') }}">
        </div>

        <div class="mb-3">
            <label>Remarks</label>
            <textarea name="remarks" class="form-control">{{ old('remarks') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Add Fee</button>
        <a href="{{ route('fees.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
