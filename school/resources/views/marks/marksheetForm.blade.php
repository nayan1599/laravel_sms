@extends('layouts.layouts')

@section('content')
<div class="container py-5">

    <!-- Title -->
    <div class="text-center mb-5">
        <h2 class="fw-bold text-primary">
            <i class="bi bi-journal-text me-1"></i>
            Generate Student Marksheet
        </h2>
        <p class="text-muted">Select student and exam to view detailed result</p>
    </div>

    <!-- Error Alert -->
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show">
            <strong>⚠️ Please fix the following errors:</strong>
            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Form Card -->
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-light fw-semibold">
                    <i class="bi bi-person-badge me-1"></i> Marksheet Information
                </div>

                <div class="card-body p-4">
                    <form action="{{ route('marksheet.view') }}" method="POST" class="row g-4">
                        @csrf

                        <!-- Student -->
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">
                                Student <span class="text-danger">*</span>
                            </label>
                            <select name="student_id" class="form-select" required>
                                <option value="">-- Select Student --</option>
                                @foreach($students as $student)
                                    <option value="{{ $student->id }}">
                                        {{ $student->name }} (Roll: {{ $student->roll_no }})
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Exam -->
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">
                                Exam <span class="text-danger">*</span>
                            </label>
                            <select name="exam_id" class="form-select" required>
                                <option value="">-- Select Exam --</option>
                                @foreach($exams as $exam)
                                    <option value="{{ $exam->id }}">
                                        {{ $exam->exam_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Submit -->
                        <div class="col-12 text-center pt-3">
                            <button type="submit" class="btn btn-primary px-5">
                                <i class="bi bi-bar-chart-line"></i>
                                View Marksheet
                            </button>
                        </div>
                    </form>
                </div>

                <div class="card-footer text-muted small text-center">
                    Ensure marks are entered before generating marksheet
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
