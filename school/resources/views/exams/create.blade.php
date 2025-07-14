@extends('layouts.layouts')

@section('content')
<div class="container py-4">
    <div class="  justify-content-center">
        <div>
            <div class=" rounded border-0">
                <div class=" ">
                    <h4 class="mb-0 main-title">{{ isset($exam) ? 'Edit' : 'Add' }} Exam</h4>
                </div>
                <div class="card-body">

                    <form action="{{ isset($exam) ? route('exams.update', $exam->id) : route('exams.store') }}" method="POST">
                        @csrf
                        @if(isset($exam)) @method('PUT') @endif

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="exam_name" class="form-label">Exam Name <span class="text-danger">*</span></label>
                                <input type="text" id="exam_name" name="exam_name" class="form-control" value="{{ old('exam_name', $exam->exam_name ?? '') }}" required>
                            </div>

                            <div class="col-md-6">
                                <label for="class_id" class="form-label">Class <span class="text-danger">*</span></label>
                                <select id="class_id" name="class_id" class="form-select" required>
                                    <option value="">Select</option>
                                    @foreach($classes as $class)
                                        <option value="{{ $class->id }}" {{ (old('class_id', $exam->class_id ?? '') == $class->id) ? 'selected' : '' }}>
                                            {{ $class->class_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="section_id" class="form-label">Section</label>
                                <select id="section_id" name="section_id" class="form-select">
                                    <option value="">Select</option>
                                    @foreach($sections as $section)
                                        <option value="{{ $section->id }}" {{ (old('section_id', $exam->section_id ?? '') == $section->id) ? 'selected' : '' }}>
                                            {{ $section->section_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="subject_id" class="form-label">Subject</label>
                                <select id="subject_id" name="subject_id" class="form-select">
                                    <option value="">Select</option>
                                    @foreach($subjects as $subject)
                                        <option value="{{ $subject->id }}" {{ (old('subject_id', $exam->subject_id ?? '') == $subject->id) ? 'selected' : '' }}>
                                            {{ $subject->subject_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="exam_date" class="form-label">Exam Date <span class="text-danger">*</span></label>
                                <input type="date" id="exam_date" name="exam_date" class="form-control" value="{{ old('exam_date', $exam->exam_date ?? '') }}" required>
                            </div>

                            <div class="col-md-3">
                                <label for="start_time" class="form-label">Start Time</label>
                                <input type="time" id="start_time" name="start_time" class="form-control" value="{{ old('start_time', $exam->start_time ?? '') }}">
                            </div>

                            <div class="col-md-3">
                                <label for="end_time" class="form-label">End Time</label>
                                <input type="time" id="end_time" name="end_time" class="form-control" value="{{ old('end_time', $exam->end_time ?? '') }}">
                            </div>

                            <div class="col-md-6">
                                <label for="total_marks" class="form-label">Total Marks <span class="text-danger">*</span></label>
                                <input type="number" id="total_marks" name="total_marks" class="form-control" value="{{ old('total_marks', $exam->total_marks ?? 100) }}" required>
                            </div>

                            <div class="col-md-6">
                                <label for="pass_marks" class="form-label">Pass Marks <span class="text-danger">*</span></label>
                                <input type="number" id="pass_marks" name="pass_marks" class="form-control" value="{{ old('pass_marks', $exam->pass_marks ?? 33) }}" required>
                            </div>

                            <div class="col-md-6">
                                <label for="exam_type" class="form-label">Exam Type</label>
                                <select id="exam_type" name="exam_type" class="form-select">
                                    <option value="written" {{ old('exam_type', $exam->exam_type ?? '') == 'written' ? 'selected' : '' }}>Written</option>
                                    <option value="oral" {{ old('exam_type', $exam->exam_type ?? '') == 'oral' ? 'selected' : '' }}>Oral</option>
                                    <option value="practical" {{ old('exam_type', $exam->exam_type ?? '') == 'practical' ? 'selected' : '' }}>Practical</option>
                                    <option value="online" {{ old('exam_type', $exam->exam_type ?? '') == 'online' ? 'selected' : '' }}>Online</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="status" class="form-label">Status</label>
                                <select id="status" name="status" class="form-select">
                                    <option value="scheduled" {{ old('status', $exam->status ?? '') == 'scheduled' ? 'selected' : '' }}>Scheduled</option>
                                    <option value="completed" {{ old('status', $exam->status ?? '') == 'completed' ? 'selected' : '' }}>Completed</option>
                                    <option value="cancelled" {{ old('status', $exam->status ?? '') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                </select>
                            </div>
                        </div>

                        <div class="mt-4 d-flex justify-content-between">
                            <a href="{{ route('exams.index') }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left-circle"></i> Back
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save2"></i> Save Exam
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
