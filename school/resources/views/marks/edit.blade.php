@extends('layouts.layouts')

@section('content')
<div class="container py-5">

    <!-- Page Title -->
    <div class="text-center mb-4">
        <h2 class="fw-bold text-primary">
            <i class="bi bi-pencil-square me-1"></i> Edit Student Mark
        </h2>
        <p class="text-muted">Update marks, grade and remarks carefully</p>
    </div>

    <!-- Error Alert -->
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show">
            <strong>⚠️ Please correct the following errors:</strong>
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
        <div class="col-lg-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-light fw-semibold">
                    <i class="bi bi-clipboard-data me-1"></i> Mark Information
                </div>

                <div class="card-body p-4">
                    <form action="{{ route('marks.update', $mark->id) }}" method="POST" class="row g-4">
                        @csrf
                        @method('PUT')

                        <!-- Student -->
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Student</label>
                            <select name="student_id" class="form-select" required>
                                <option value="">-- Select Student --</option>
                                @foreach($students as $student)
                                    <option value="{{ $student->id }}"
                                        {{ $mark->student_id == $student->id ? 'selected' : '' }}>
                                        {{ $student->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Exam -->
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Exam</label>
                            <select name="exam_id" class="form-select" required>
                                <option value="">-- Select Exam --</option>
                                @foreach($exams as $exam)
                                    <option value="{{ $exam->id }}"
                                        {{ $mark->exam_id == $exam->id ? 'selected' : '' }}>
                                        {{ $exam->exam_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Subject -->
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Subject</label>
                            <select name="subject_id" class="form-select" required>
                                <option value="">-- Select Subject --</option>
                                @foreach($subjects as $subject)
                                    <option value="{{ $subject->id }}"
                                        {{ $mark->subject_id == $subject->id ? 'selected' : '' }}>
                                        {{ $subject->subject_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Marks Obtained -->
                        <div class="col-md-3">
                            <label class="form-label fw-semibold">Marks Obtained</label>
                            <input type="number"
                                   name="marks_obtained"
                                   value="{{ $mark->marks_obtained }}"
                                   class="form-control"
                                   step="0.01"
                                   required>
                        </div>

                        <!-- Total Marks -->
                        <div class="col-md-3">
                            <label class="form-label fw-semibold">Total Marks</label>
                            <input type="number"
                                   name="total_marks"
                                   value="{{ $mark->total_marks }}"
                                   class="form-control">
                        </div>

                        <!-- Grade -->
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Grade</label>
                            <input type="text"
                                   name="grade"
                                   value="{{ $mark->grade }}"
                                   class="form-control"
                                   placeholder="A+, A, B, C, F">
                        </div>

                        <!-- Remarks -->
                        <div class="col-md-8">
                            <label class="form-label fw-semibold">Remarks</label>
                            <textarea name="remarks"
                                      rows="2"
                                      class="form-control"
                                      placeholder="Optional remarks">{{ $mark->remarks }}</textarea>
                        </div>

                        <!-- Buttons -->
                        <div class="col-12 text-center pt-3">
                            <button type="submit" class="btn btn-primary px-5 me-2">
                                <i class="bi bi-check-circle"></i> Update Mark
                            </button>
                            <a href="{{ route('marks.index') }}" class="btn btn-outline-secondary px-4">
                                <i class="bi bi-arrow-left"></i> Back
                            </a>
                        </div>

                    </form>
                </div>

                <div class="card-footer text-muted small text-center">
                    Ensure marks are accurate before updating
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
