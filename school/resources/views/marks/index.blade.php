@extends('layouts.layouts')

@section('content')
<div class="container">
    <h2 class="mb-4">All Marks</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('marks.create') }}" class="btn btn-success mb-3">+ Add Mark</a>

    <div class="card shadow">
        <div class="card-body">
            <table class="table table-bordered table-hover table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Student</th>
                        <th>Exam</th>
                        <th>Subject</th>
                        <th>Marks Obtained</th>
                        <th>Total Marks</th>
                        <th>Grade</th>
                        <th>Remarks</th>
                        <th>Recorded At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($marks as $index => $mark)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $mark->student->name ?? 'N/A' }}</td>
                            <td>{{ $mark->exam->exam_name ?? 'N/A' }}</td>
                            <td>{{ $mark->subject->subject_name ?? 'N/A' }}</td>
                            <td>{{ $mark->marks_obtained }}</td>
                            <td>{{ $mark->total_marks }}</td>
                            <td>{{ $mark->grade }}</td>
                            <td>{{ $mark->remarks }}</td>
                            <td>{{ \Carbon\Carbon::parse($mark->recorded_at)->format('d M Y') }}</td>
                            <td>
                                <a href="{{ route('marks.show', $mark->id) }}" class="btn btn-sm btn-info">View</a>
                                <a href="{{ route('marks.edit', $mark->id) }}" class="btn btn-sm btn-warning">Edit</a>

                                <form action="{{ route('marks.destroy', $mark->id) }}" method="POST" class="d-inline-block"
                                    onsubmit="return confirm('Are you sure you want to delete this mark?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="text-center">No marks found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
