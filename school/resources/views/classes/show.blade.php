@extends('layouts.layouts')

@section('content')
<div class="container">
    <h1>Class Details: {{ $class->class_name }}</h1>

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <td>{{ $class->id }}</td>
        </tr>
        <tr>
            <th>Class Name</th>
            <td>{{ $class->class_name }}</td>
        </tr>
        <tr>
            <th>Class Numeric</th>
            <td>{{ $class->class_numeric }}</td>
        </tr>
        <tr>
            <th>Class Code</th>
            <td>{{ $class->class_code ?? 'N/A' }}</td>
        </tr>
        <tr>
            <th>Medium</th>
            <td>{{ ucfirst($class->medium) }}</td>
        </tr>
        <tr>
            <th>Shift</th>
            <td>{{ ucfirst($class->shift) }}</td>
        </tr>
        <tr>
            <th>Class Teacher</th>
            <td>{{ $class->teacher ? $class->teacher->name : 'N/A' }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ ucfirst($class->status) }}</td>
        </tr>
        <tr>
            <th>Created At</th>
            <td>{{ $class->created_at->format('d M Y, h:i A') }}</td>
        </tr>
        <tr>
            <th>Updated At</th>
            <td>{{ $class->updated_at->format('d M Y, h:i A') }}</td>
        </tr>
    </table>

    <a href="{{ route('classes.index') }}" class="btn btn-secondary">Back</a>
    <a href="{{ route('classes.edit', $class->id) }}" class="btn btn-warning">Edit</a>
</div>
@endsection
