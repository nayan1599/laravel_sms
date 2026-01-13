@extends('layouts.app')
@section('title','View Salary')
@section('content')
<div class="container py-4">
    <div class="card shadow-sm">
        <div class="card-header bg-info text-white">
            Salary Details
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Employee</th>
                    <td>{{ $salary->employee->name ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <th>Salary Month</th>
                    <td>{{ \Carbon\Carbon::parse($salary->salary_month)->format('M Y') }}</td>
                </tr>
                <tr>
                    <th>Amount</th>
                    <td>{{ number_format($salary->amount,2) }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>{{ ucfirst($salary->status) }}</td>
                </tr>
                <tr>
                    <th>Paid Date</th>
                    <td>{{ $salary->paid_at ? \Carbon\Carbon::parse($salary->paid_at)->format('d M Y') : '-' }}</td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td>{{ $salary->description }}</td>
                </tr>
            </table>
            <div class="text-end">
                <a href="{{ route('salaries.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>
</div>
@endsection
