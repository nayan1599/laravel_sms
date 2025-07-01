@extends('layouts.layouts')

@section('content')
<div class="container">
    <h2>Sections List</h2>
    <a href="{{ route('sections.create') }}" class="btn btn-success mb-2">Add New Section</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Class</th>
                <th>Section</th>
                <th>Capacity</th>
                <th>Teacher</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($sections as $section)
            <tr>
                <td>{{ $section->class->class_name ?? 'N/A' }}</td>
                <td>{{ $section->section_name }}</td>
                <td>{{ $section->section_capacity }}</td>
                <td>{{ $section->teacher->name ?? 'N/A' }}</td>
                <td>{{ ucfirst($section->status) }}</td>
                <td>
                    <a href="{{ route('sections.edit', $section->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('sections.destroy', $section->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $sections->links() }}
</div>
@endsection
