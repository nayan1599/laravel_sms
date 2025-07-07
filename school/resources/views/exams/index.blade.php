@extends('layouts.layouts')

@section('content')
<div class="container">
    <h2>All Exams</h2>
    <a href="{{ route('exams.create') }}" class="btn btn-success mb-3">+ Add Exam</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Exam Name</th>
                <th>Class</th>
                <th>Date</th>
                <th>Type</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($exams as $exam)
            <tr>
                <td>{{ $exam->exam_name }}</td>
                <td>{{ $exam->class->class_name }}</td>
                <td>{{ $exam->exam_date }}</td>
                <td>{{ ucfirst($exam->exam_type) }}</td>
                <td>{{ ucfirst($exam->status) }}</td>
                <td>
                    <a href="{{ route('exams.edit', $exam->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('exams.destroy', $exam->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm"
                            onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
