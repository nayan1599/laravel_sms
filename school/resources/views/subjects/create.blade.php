@extends('layouts.layouts')

@section('content')
<div class="container py-4">
    <div class="  justify-content-center">
 
            <div class=" rounded border-0">
                <div class="">
                    <h4 class="mb-0 main-title"><i class="bi bi-journal-plus"></i> Add New Subject</h4>
                </div>
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('subjects.store') }}" method="POST">
                        @csrf

                        <div class="row g-3">
                            <!-- Subject Name -->
                            <div class="col-md-6">
                                <label for="subject_name" class="form-label">Subject Name <span class="text-danger">*</span></label>
                                <input type="text" name="subject_name" id="subject_name" class="form-control" required value="{{ old('subject_name') }}">
                            </div>

                            <!-- Subject Code -->
                            <div class="col-md-6">
                                <label for="subject_code" class="form-label">Subject Code <span class="text-danger">*</span></label>
                                <input type="text" name="subject_code" id="subject_code" class="form-control" required value="{{ old('subject_code') }}">
                            </div>

                            <!-- Class -->
                            <div class="col-md-6">
                                <label for="class_id" class="form-label">Class <span class="text-danger">*</span></label>
                                <select name="class_id" id="class_id" class="form-select" required>
                                    <option value="">Select Class</option>
                                    @foreach ($classes as $class)
                                        <option value="{{ $class->id }}" {{ old('class_id') == $class->id ? 'selected' : '' }}>{{ $class->class_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Type -->
                            <div class="col-md-6">
                                <label for="type" class="form-label">Type</label>
                                <select name="type" id="type" class="form-select">
                                    <option value="compulsory" {{ old('type') == 'compulsory' ? 'selected' : '' }}>Compulsory</option>
                                    <option value="optional" {{ old('type') == 'optional' ? 'selected' : '' }}>Optional</option>
                                </select>
                            </div>

                            <!-- Marks -->
                            <div class="col-md-4">
                                <label for="full_marks" class="form-label">Full Marks</label>
                                <input type="number" name="full_marks" id="full_marks" class="form-control" value="{{ old('full_marks', 100) }}">
                            </div>
                            <div class="col-md-4">
                                <label for="pass_marks" class="form-label">Pass Marks</label>
                                <input type="number" name="pass_marks" id="pass_marks" class="form-control" value="{{ old('pass_marks', 33) }}">
                            </div>
                            <div class="col-md-4">
                                <label for="practical_marks" class="form-label">Practical Marks</label>
                                <input type="number" name="practical_marks" id="practical_marks" class="form-control" value="{{ old('practical_marks', 0) }}">
                            </div>

                            <!-- Subject Teacher -->
                            <div class="col-md-6">
                                <label for="subject_teacher_id" class="form-label">Subject Teacher</label>
                                <select name="subject_teacher_id" id="subject_teacher_id" class="form-select">
                                    <option value="">-- Optional --</option>
                                    @foreach ($teachers as $teacher)
                                        <option value="{{ $teacher->id }}" {{ old('subject_teacher_id') == $teacher->id ? 'selected' : '' }}>{{ $teacher->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Status -->
                            <div class="col-md-6">
                                <label for="status" class="form-label">Status</label>
                                <select name="status" id="status" class="form-select">
                                    <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('subjects.index') }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left-circle"></i> Back
                            </a>
                            <button type="submit" class="btn btn-success">
                                <i class="bi bi-save2"></i> Create Subject
                            </button>
                        </div>

                    </form>

                </div>
            </div>
       
    </div>
</div>
@endsection
