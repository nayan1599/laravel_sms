@extends('layouts.layouts')
@section('title', 'My Class List')
 @section('content')


 <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Class Name</th>
                <th>Numeric</th>
                <th>Code</th>
                <th>Medium</th>
                <th>Shift</th>
                <th>Teacher</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($classes as $class)

           
            <tr>
                <td>{{ $class->id }}</td>
                <td>{{ $class->class_name }}</td>
                <td>{{ $class->class_numeric }}</td>
                <td>{{ $class->class_code }}</td>
                <td>{{ ucfirst($class->medium) }}</td>
                <td>{{ ucfirst($class->shift) }}</td>
                <td>{{ $class->teacher ? $class->teacher->name : 'N/A' }}</td>
                <td>{{ ucfirst($class->status) }}</td>
                <td>
                    <a href="{{ route('classes.show', $class->id) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('classes.edit', $class->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('classes.destroy', $class->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm"
                            onclick="return confirm('Are you sure to delete this class?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

 
@endsection