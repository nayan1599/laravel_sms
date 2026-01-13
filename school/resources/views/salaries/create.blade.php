@extends('layouts.app')
@section('title','Add Salary')
@section('content')
<div class="container py-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            Add Salary
        </div>
        <div class="card-body">
            <form action="{{ route('salaries.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label>Employee</label>
                    <select name="employee_id" class="form-select" required>
                        <option value="">-- Select Employee --</option>
                        @foreach($employees as $emp)
                        <option value="{{ $emp->id }}" {{ old('employee_id')==$emp->id?'selected':'' }}>
                            {{ $emp->name }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label>Salary Month</label>
                    <input type="month" name="salary_month" class="form-control" value="{{ old('salary_month') }}" required>
                </div>

                <div class="mb-3">
                    <label>Amount</label>
                    <input type="number" step="0.01" name="amount" class="form-control" value="{{ old('amount') }}" required>
                </div>

                <div class="mb-3">
                    <label>Status</label>
                    <select name="status" class="form-select">
                        <option value="pending" {{ old('status')=='pending'?'selected':'' }}>Pending</option>
                        <option value="paid" {{ old('status')=='paid'?'selected':'' }}>Paid</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label>Paid Date</label>
                    <input type="date" name="paid_at" class="form-control" value="{{ old('paid_at') }}">
                </div>

                <div class="mb-3">
                    <label>Description</label>
                    <textarea name="description" class="form-control">{{ old('description') }}</textarea>
                </div>

                <button type="submit" class="btn btn-success">Save Salary</button>
                <a href="{{ route('salaries.index') }}" class="btn btn-secondary">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection
