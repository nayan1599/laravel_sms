@extends('layouts.layouts')

@section('content')
<div class="container">
    <h2 class="main-title">Fee Types</h2>
    <a href="{{ route('fee-types.create') }}" class="btn btn-success mb-3">+ Add Fee Type</a>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered table-hover table-striped">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Class</th>
                <th>Description </th>
                <th>Amount</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($feeTypes as $index => $fee)
            <tr>
                <td>{{ $index + 1 }}</td>
                <th>{{ $fee->name }}</th>
                <td>{{ $fee->class_id->class_name ?? 'N/A' }}</td>
                <td>{{$fee->description}}</td>
                <td>{{ number_format($fee->default_amount, 2) }}</td>
                <td>{{ $fee->created_at->format('d M Y') }}</td>
                <td>
                    <a href="{{ route('fee-types.edit', $fee->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('fee-types.destroy', $fee->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection