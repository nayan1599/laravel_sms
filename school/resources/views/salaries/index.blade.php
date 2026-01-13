@extends('layouts.app')
@section('title','Salaries')
@section('content')
<div class="container py-4">

    <div class="d-flex justify-content-between mb-3">
        <h4 class="mb-0">Salaries</h4>
        <a href="{{ route('salaries.create') }}" class="btn btn-primary">+ Add Salary</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Employee</th>
                <th>Salary Month</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Paid Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($salaries as $salary)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $salary->employee->name ?? 'N/A' }}</td>
                <td>{{ \Carbon\Carbon::parse($salary->salary_month)->format('M Y') }}</td>
                <td>{{ number_format($salary->amount,2) }}</td>
                <td>
                    <span class="badge {{ $salary->status=='paid'?'bg-success':'bg-warning text-dark' }}">
                        {{ ucfirst($salary->status) }}
                    </span>
                </td>
                <td>{{ $salary->paid_at ? \Carbon\Carbon::parse($salary->paid_at)->format('d M Y') : '-' }}</td>
                <td>
                    <a href="{{ route('salaries.edit',$salary->id) }}" class="btn btn-sm btn-warning">Edit</a>

                    <form action="{{ route('salaries.destroy',$salary->id) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</button>
                    </form>

                    <a href="{{ route('salaries.show',$salary->id) }}" class="btn btn-sm btn-info">View</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
