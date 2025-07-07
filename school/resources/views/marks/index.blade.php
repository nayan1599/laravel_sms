@extends('layouts.layouts')

@section('content')
<div class="container">
    <h2>Marks List</h2>
    <a href="{{ route('marks.create') }}" class="btn btn-success mb-3">+ Add Marks</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Student</th>
                <th>Exam</th>
                <th>Subject</th>
                <th>Marks</th>
                <th>Grade</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($marks as $mark)
            <tr>
                <td>{{ $mark->student->name }}</td>
                <td>{{ $mark->exam->exam_name }}</td>
                <td>{{ $mark->subject->subject_name }}</td>
                <td>{{ $mark->marks_obtained }}/{{ $mark->total_marks }}</td>
                <td>{{ $mark->grade }}</td>
                <td>
                    <a href="{{ route('marks.edit', $mark->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('marks.destroy', $mark->id) }}" method="POST" style="display:inline-block;">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this mark?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
