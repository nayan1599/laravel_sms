@extends('layouts.layouts')

@section('content')
<div class="container py-4">
    <div class="text-center mb-4">
        <h2 class="fw-bold main-title">Student Mark Sheet</h2>
        <p class="text-muted">Detailed exam result for individual student</p>
    </div>

    <div class="card border-primary shadow">
        <div class="card-header bg-primary text-white fw-semibold">
            Basic Information
        </div>
        <div class="card-body">
            <div class="row mb-2">
                <div class="col-md-6">
                    <strong>Student Name:</strong> {{ $mark->student->name ?? 'N/A' }}
                </div>
                <div class="col-md-6">
                    <strong>Exam:</strong> {{ $mark->exam->exam_name ?? 'N/A' }}
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-md-6">
                    <strong>Subject:</strong> {{ $mark->subject->subject_name ?? 'N/A' }}
                </div>
                <div class="col-md-6">
                    <strong>Date:</strong> {{ \Carbon\Carbon::parse($mark->recorded_at)->format('d M, Y') }}
                </div>
            </div>
        </div>
    </div>

    <div class="card border-success shadow mt-4">
        <div class="card-header bg-success text-white fw-semibold">
            Mark Details
        </div>
        <div class="card-body">
            <div class="row mb-2">
                <div class="col-md-4">
                    <strong>Marks Obtained:</strong> {{ $mark->marks_obtained }}
                </div>
                <div class="col-md-4">
                    <strong>Total Marks:</strong> {{ $mark->total_marks }}
                </div>
                <div class="col-md-4">
                    <strong>Grade:</strong> {{ $mark->grade }}
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <strong>Remarks:</strong>
                    <p class="mb-0">{{ $mark->remarks ?: 'N/A' }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="text-center mt-4">
        <a href="{{ route('marks.index') }}" class="btn btn-secondary px-4">← Back to List</a>
        <a href="{{ route('marks.edit', $mark->id) }}" class="btn btn-warning px-4">Edit</a>
    </div>
</div>
@endsection
