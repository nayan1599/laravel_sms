@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4 main-title">All Employees</h2>

    <a href="{{ route('employees.create') }}" class="btn btn-success mb-3">+ Add Employee</a>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

   <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Designation</th>
                <th>Joining Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $key => $emp)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $emp->name }}</td>
                <td>{{ $emp->email }}</td>
                <td>{{ $emp->phone }}</td>
                <td>{{ $emp->designation }}</td>
                <td>{{ $emp->joining_date }}</td>
                <td>
                    <a href="{{ route('employees.edit', $emp->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('employees.destroy', $emp->id) }}" method="POST" class="d-inline"
                        onsubmit="return confirm('Are you sure?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $employees->links() }}
</div>
@endsection