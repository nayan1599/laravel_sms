@extends('layouts.layouts')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="main-title">All Teachers</h2>
        <a href="{{ route('teachers.create') }}" class="btn btn-primary">+ Add New Teacher</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Employee ID</th>
                <th>Name</th>
                <th>Designation</th>
                <th>Department</th>
                <th>Join Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($teachers as $index => $teacher)
            <tr>
                <td>{{ $teachers->firstItem() + $index }}</td>
                <td>{{ $teacher->employee_id }}</td>
                <td>{{ $teacher->name }}</td>
                <td>{{ $teacher->designation }}</td>
                <td>{{ $teacher->department ?? '-' }}</td>
                <td>{{ $teacher->date_of_joining }}</td>
                <td>
                    <span class="badge 
                        @if($teacher->status == 'active') bg-success
                        @elseif($teacher->status == 'on_leave') bg-warning
                        @elseif($teacher->status == 'resigned') bg-secondary
                        @else bg-danger @endif">
                        {{ ucfirst($teacher->status) }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('teachers.show', $teacher->id) }}" class="btn btn-sm btn-info">View</a>
                    <a href="{{ route('teachers.edit', $teacher->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST" class="d-inline" 
                          onsubmit="return confirm('Are you sure you want to delete this teacher?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="8" class="text-center">No teachers found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="d-flex justify-content-center">
        {{ $teachers->links() }}
    </div>
</div>
@endsection
