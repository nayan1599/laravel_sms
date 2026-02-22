@extends('layouts.layouts')

@section('content')
<div class="container">
    <h2 class="main-title">Subject List</h2>
    <div class="text-end">
        <a href="{{ route('subjects.create') }}" class="btn btn-primary mb-3">Add New Subject</a>
    </div>


    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif


    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Name</th>
                <th>Code</th>
                <!-- <th>Class</th> -->
                <!-- <th>Teacher</th> -->
                <th>Type</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($subjects as $subject)
            <tr>
                <td>{{ $subject->subject_name }}</td>
                <td>{{ $subject->subject_code }}</td>
                <!-- <td>{{ $subject->class->class_name ?? 'N/A' }}</td> -->
                <!-- <td>{{ $subject->teacher->name ?? 'N/A' }}</td> -->
                <td>{{ ucfirst($subject->type) }}</td>
                <td>{{ ucfirst($subject->status) }}</td>
                <td>
                    <a href="{{ route('subjects.edit', $subject->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('subjects.destroy', $subject->id) }}" method="POST" style="display:inline-block">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this subject?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
<!-- 
    {{ $subjects->links() }} -->
</div>
@endsection