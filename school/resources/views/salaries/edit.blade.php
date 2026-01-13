@extends('layouts.app')
@section('title','Edit Salary')
@section('content')
<div class="container py-4">
    <div class="card shadow-sm">
        <div class="card-header bg-warning text-dark">
            Edit Salary
        </div>
        <div class="card-body">
            <form action="{{ route('salaries.update',$salary->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>Employee</label>
                    <select name="employee_id" class="form-select" required>
                        @foreach($employees as $emp)
                        <option value="{{ $emp->id }}" {{ $salary->employee_id==$emp->id?'selected':'' }}>
                            {{ $emp->name }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label>Salary Month</label>
                    <input type="month" name="salary_month" class="form-control" value="{{ \Carbon\Carbon::parse($salary->salary_month)->format('Y-m') }}" required>
                </div>

                <div class="mb-3">
                    <label>Amount</label>
                    <input type="number" step="0.01" name="amount" class="form-control" value="{{ $salary->amount }}" required>
                </div>

                <div class="mb-3">
                    <label>Status</label>
                    <select name="status" class="form-select">
                        <option value="pending" {{ $salary->status=='pending'?'selected':'' }}>Pending</option>
                        <option value="paid" {{ $salary->status=='paid'?'selected':'' }}>Paid</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label>Paid Date</label>
                    <input type="date" name="paid_at" class="form-control" value="{{ $salary->paid_at }}">
                </div>

                <div class="mb-3">
                    <label>Description</label>
                    <textarea name="description" class="form-control">{{ $salary->description }}</textarea>
                </div>

                <button type="submit" class="btn btn-success">Update Salary</button>
                <a href="{{ route('salaries.index') }}" class="btn btn-secondary">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection
