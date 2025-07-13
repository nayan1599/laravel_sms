@extends('layouts.layouts')

@section('content')
<div class="container">
    <h2 class="main-title">All Students</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('students.create') }}" class="btn btn-success mb-3">+ Add New Student</a>

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Class</th>
                    <th>Section</th>
                    <th>Roll</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Guardian</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($students as $student)
                <tr>
                    <td>
                        @if($student->photo)
                            <img src="{{ asset($student->photo) }}" width="50" height="50" class="rounded">
                        @else
                            N/A
                        @endif
                    </td>
                    <td>{{ $student->name }}</td>
                    <td>{{ ucfirst($student->gender) ?? 'N/A' }}</td>
                    <td>{{ $student->studentClass->class_name ?? 'N/A' }}</td>
                    <td>{{ $student->section->section_name ?? 'N/A' }}</td>
                    <td>{{ $student->roll ?? 'N/A' }}</td>
                    <td>{{ $student->phone ?? 'N/A' }}</td>
                    <td>{{ $student->email ?? 'N/A' }}</td>
                    <td>{{ $student->father_name ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('students.show', $student->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure to delete?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="10" class="text-center">No students found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="d-flex justify-content-center mt-3">
        {{ $students->links() }}
    </div>
</div>
@endsection
