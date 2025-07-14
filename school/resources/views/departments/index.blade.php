@extends('layouts.layouts')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="main-title">Department List</h2>
        <a href="{{ route('departments.create') }}" class="btn btn-success">
           + Add Department
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class=" ">
        <div class=" ">
  
  <table class="table table-bordered table-striped">
        <thead class="table-dark">
                    <tr>
                        <th style="width: 5%">#</th>
                        <th style="width: 70%">Department Name</th>
                        <th style="width: 25%" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($departments as $key => $department)
                        <tr>
                            <td>{{ $departments->firstItem() + $key }}</td>
                            <td>{{ $department->name }}</td>
                            <td class="text-center">
                                <a href="{{ route('departments.edit', $department->id) }}" class="btn btn-sm btn-outline-warning me-1">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>

                                <form action="{{ route('departments.destroy', $department->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure to delete this department?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger">
                                        <i class="bi bi-trash3"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center text-muted py-4">No departments found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($departments->hasPages())
            <div class="card-footer">
                {{ $departments->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
