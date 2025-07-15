@extends('layouts.layouts')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="main-title mb-0">All Exams</h2>
        <a href="{{ route('exams.create') }}" class="btn btn-success">
            <i class="bi bi-plus-circle"></i> Add Exam
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Search Box -->
    <form action="{{ route('exams.index') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Search exam name or type...">
            <button class="btn btn-outline-secondary" type="submit">Search</button>
        </div>
    </form>

    <!-- Table -->
    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-dark text-center">
                <tr>
                    <th>Exam Name</th>
                    <th>Class</th>
                    <th>Date</th>
                    <th>Start</th>
                    <th>End</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th width="150">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($exams as $exam)
                    <tr class="text-center">
                        <td>{{ $exam->exam_name }}</td>
                        <td>{{ $exam->class->class_name }}</td>
                        <td>{{ \Carbon\Carbon::parse($exam->exam_date)->format('d M Y') }}</td>
                        <td>{{ $exam->start_time }}</td>
                        <td>{{ $exam->end_time }}</td>
                        <td>{{ ucfirst($exam->exam_type) }}</td>
                        <td>
                            <span class="badge bg-{{ $exam->status == 'scheduled' ? 'info' : ($exam->status == 'completed' ? 'success' : 'danger') }}">
                                {{ ucfirst($exam->status) }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('exams.edit', $exam->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('exams.destroy', $exam->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure to delete this exam?');">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted">No exams found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination (optional) -->
    <div class="mt-3">
        {{ $exams->links() }}
    </div>
</div>
@endsection
