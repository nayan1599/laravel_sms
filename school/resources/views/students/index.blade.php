@extends('layouts.layouts')

@section('content')
<div class="container">
    <h2>All Students</h2>

    <a href="{{ route('students.create') }}" class="btn btn-success mb-3">+ Add Student</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Photo</th>
                <th>Name</th>
                <th>Class</th>
                <th>Roll</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($students as $student)
            <tr>
                <td>
                    @if($student->photo)
                        <img src="{{ asset($student->photo) }}" width="50" class="rounded">
                    @else
                        N/A
                    @endif
                </td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->studentClass->class_name ?? 'N/A' }}</td>
                <td>{{ $student->roll }}</td>
                <td>{{ $student->phone }}</td>
                <td>
                    <a href="{{ route('students.show', $student->id) }}" class="btn btn-sm btn-primary">View</a>
                    <a href="{{ route('students.edit', $student->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline-block;">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="6" class="text-center">No students found.</td></tr>
            @endforelse
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $students->links() }}
    </div>
</div>
@endsection
