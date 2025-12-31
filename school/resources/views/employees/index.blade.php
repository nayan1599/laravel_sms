@extends('layouts.layouts')
@section('title', 'Employees List')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6  my-4">
            <h2 class="mb-4 main-title">All Employees</h2>
        </div>
        <div class="col-md-6 text-end my-4">
            <a href="{{ route('employees.create') }}" class="btn btn-success mb-3">+ Add Employee</a>

        </div>
    </div>

<!-- total employees -->
  <div class="row mb-5 g-4">

    <!-- Total Employees -->
    <div class="col-md-4">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-body d-flex align-items-center">
                <div class="icon-box bg-primary text-white me-3">
                    <i class="bi bi-people-fill"></i>
                </div>
                <div>
                    <h6 class="text-muted mb-1">Total Employees</h6>
                    <h3 class="fw-bold mb-0">{{ $totalEmployees }}</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Active Employees -->
    <div class="col-md-4">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-body d-flex align-items-center">
                <div class="icon-box bg-success text-white me-3">
                    <i class="bi bi-person-check-fill"></i>
                </div>
                <div>
                    <h6 class="text-muted mb-1">Active Employees</h6>
                    <h3 class="fw-bold mb-0">{{ $totalactive }}</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Inactive Employees -->
    <div class="col-md-4">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-body d-flex align-items-center">
                <div class="icon-box bg-danger text-white me-3">
                    <i class="bi bi-person-x-fill"></i>
                </div>
                <div>
                    <h6 class="text-muted mb-1">Inactive Employees</h6>
                    <h3 class="fw-bold mb-0">{{ $totalinactive }}</h3>
                </div>
            </div>
        </div>
    </div>

</div>




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