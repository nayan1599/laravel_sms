@extends('layouts.layouts')

@section('content')
<div class="container py-4">
    <h2 class="mb-4 main-title">🎓 Generate Student Marksheet</h2>

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <form action="{{ route('marksheet.view') }}" method="POST" class="row g-3">
        @csrf

        <div class="col-md-6">
            <label for="student_id" class="form-label">Select Student</label>
            <select name="student_id" class="form-select" required>
                <option value="">-- Choose Student --</option>
                @foreach($students as $student)
                    <option value="{{ $student->id }}">{{ $student->name }} (Roll: {{ $student->roll_no }})</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-6">
            <label for="exam_id" class="form-label">Select Exam</label>
            <select name="exam_id" class="form-select" required>
                <option value="">-- Choose Exam --</option>
                @foreach($exams as $exam)
                    <option value="{{ $exam->id }}">{{ $exam->exam_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-bar-chart-line"></i> View Marksheet
            </button>
        </div>
    </form>
</div>
@endsection
