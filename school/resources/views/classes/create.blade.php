@extends('layouts.layouts')

@section('content')
<div class="container py-4">
    <div class="  justify-content-center">
        <div>
            <div class="  border-0 rounded">
                <div class="card-header text-white">
                    <h4 class="mb-0 main-title"><i class="bi bi-plus-circle"></i> Create New Class</h4>
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

                    <form action="{{ route('classes.store') }}" method="POST">
                        @csrf

                        <div class="row">
                            <!-- Class Name -->
                            <div class="col-md-6 mb-3">
                                <label for="class_name" class="form-label">Class Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="class_name" name="class_name" value="{{ old('class_name') }}" required maxlength="50">
                            </div>

                            <!-- Class Numeric -->
                            <div class="col-md-6 mb-3">
                                <label for="class_numeric" class="form-label">Class Numeric <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="class_numeric" name="class_numeric" value="{{ old('class_numeric') }}" required>
                            </div>

                            <!-- Class Code -->
                            <div class="col-md-6 mb-3">
                                <label for="class_code" class="form-label">Class Code (auto-generated if blank)</label>
                                <input type="text" class="form-control" id="class_code" name="class_code" value="{{ old('class_code') }}" maxlength="10">
                            </div>

                            <!-- Medium -->
                            <div class="col-md-6 mb-3">
                                <label for="medium" class="form-label">Medium <span class="text-danger">*</span></label>
                                <select class="form-select" id="medium" name="medium" required>
                                    <option value="bangla" {{ old('medium') == 'bangla' ? 'selected' : '' }}>Bangla</option>
                                    <option value="english" {{ old('medium') == 'english' ? 'selected' : '' }}>English</option>
                                    <option value="bilingual" {{ old('medium') == 'bilingual' ? 'selected' : '' }}>Bilingual</option>
                                </select>
                            </div>

                            <!-- Shift -->
                            <div class="col-md-6 mb-3">
                                <label for="shift" class="form-label">Shift <span class="text-danger">*</span></label>
                                <select class="form-select" id="shift" name="shift" required>
                                    <option value="morning" {{ old('shift') == 'morning' ? 'selected' : '' }}>Morning</option>
                                    <option value="day" {{ old('shift') == 'day' ? 'selected' : '' }}>Day</option>
                                    <option value="evening" {{ old('shift') == 'evening' ? 'selected' : '' }}>Evening</option>
                                </select>
                            </div>

                            <!-- Class Teacher -->
                            <div class="col-md-6 mb-3">
                                <label for="class_teacher_id" class="form-label">Class Teacher</label>
                                <select class="form-select" id="class_teacher_id" name="class_teacher_id">
                                    <option value="">-- Select Teacher --</option>
                                    @foreach($teachers as $teacher)
                                    <option value="{{ $teacher->id }}" {{ old('class_teacher_id') == $teacher->id ? 'selected' : '' }}>
                                        {{ $teacher->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Status -->
                            <div class="col-md-6 mb-3">
                                <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                                <select class="form-select" id="status" name="status" required>
                                    <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>
                        </div>

                        <!-- Buttons -->
                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('classes.index') }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left-circle"></i> Back
                            </a>
                            <button type="submit" class="btn btn-success">
                                <i class="bi bi-save2"></i> Create Class
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection