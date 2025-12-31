@extends('layouts.layouts')

@section('content')
<div class="container py-5">

    <!-- Title -->
    <div class="text-center mb-5">
        <h2 class="fw-bold text-primary">Student Mark Sheet</h2>
        <p class="text-muted">Individual exam performance summary</p>
    </div>

    <!-- Student & Exam Info -->
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header bg-light fw-semibold">
            <i class="bi bi-person-lines-fill me-1"></i> Student Information
        </div>
        <div class="card-body">
            <div class="row gy-3">
                <div class="col-md-6">
                    <small class="text-muted">Student Name</small>
                    <div class="fw-semibold fs-6">{{ $mark->student->name ?? 'N/A' }}</div>
                </div>
                <div class="col-md-6">
                    <small class="text-muted">Exam</small>
                    <div class="fw-semibold fs-6">{{ $mark->exam->exam_name ?? 'N/A' }}</div>
                </div>
                <div class="col-md-6">
                    <small class="text-muted">Subject</small>
                    <div class="fw-semibold fs-6">{{ $mark->subject->subject_name ?? 'N/A' }}</div>
                </div>
                <div class="col-md-6">
                    <small class="text-muted">Result Date</small>
                    <div class="fw-semibold fs-6">
                        {{ \Carbon\Carbon::parse($mark->recorded_at)->format('d M Y') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Marks Summary -->
    <div class="card shadow-sm border-0">
        <div class="card-header bg-success text-white fw-semibold">
            <i class="bi bi-clipboard-check me-1"></i> Marks Summary
        </div>
        <div class="card-body">

            <div class="row text-center mb-4">
                <div class="col-md-4">
                    <div class="p-3 rounded bg-light">
                        <div class="text-muted">Marks Obtained</div>
                        <h3 class="fw-bold text-success">{{ $mark->marks_obtained }}</h3>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-3 rounded bg-light">
                        <div class="text-muted">Total Marks</div>
                        <h3 class="fw-bold text-primary">{{ $mark->total_marks }}</h3>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-3 rounded bg-light">
                        <div class="text-muted">Grade</div>
                        <span class="badge bg-success fs-5 px-3 py-2">
                            {{ $mark->grade }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- Progress -->
            @php
                $percentage = ($mark->total_marks > 0)
                    ? round(($mark->marks_obtained / $mark->total_marks) * 100, 2)
                    : 0;
            @endphp

            <div class="mb-3">
                <div class="d-flex justify-content-between">
                    <small class="text-muted">Performance</small>
                    <small class="fw-semibold">{{ $percentage }}%</small>
                </div>
                <div class="progress" style="height: 10px;">
                    <div class="progress-bar bg-success"
                         style="width: {{ $percentage }}%">
                    </div>
                </div>
            </div>

            <!-- Remarks -->
            <div class="mt-4">
                <small class="text-muted">Remarks</small>
                <p class="mb-0 fw-semibold">
                    {{ $mark->remarks ?: 'No remarks available.' }}
                </p>
            </div>

        </div>
    </div>

    <!-- Actions -->
    <div class="text-center mt-4">
        <a href="{{ route('marks.index') }}" class="btn btn-outline-secondary px-4 me-2">
            <i class="bi bi-arrow-left"></i> Back
        </a>
        <a href="{{ route('marks.edit', $mark->id) }}" class="btn btn-warning px-4 me-2">
            <i class="bi bi-pencil-square"></i> Edit
        </a>
        <button onclick="window.print()" class="btn btn-primary px-4">
            <i class="bi bi-printer"></i> Print
        </button>
    </div>

</div>
@endsection
