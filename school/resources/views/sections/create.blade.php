@extends('layouts.layouts')

@section('content')
<div class="container py-4">
    <div class=" justify-content-center">
        <div>
            <div class=" border-0 rounded">
                <div>
                    <h4 class="mb-0 main-title"><i class="bi bi-plus-circle"></i> Add New Section</h4>
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

                    <form action="{{ route('sections.store') }}" method="POST">
                        @csrf

                        <div class="row">
                            <!-- Class -->
                            <div class="col-md-6 mb-3">
                                <label for="class_id" class="form-label">Class <span class="text-danger">*</span></label>
                                <select name="class_id" id="class_id" class="form-select" required>
                                    <option value="">-- Select Class --</option>
                                    @foreach($classes as $class)
                                        <option value="{{ $class->id }}" {{ old('class_id') == $class->id ? 'selected' : '' }}>
                                            {{ $class->class_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Section Name -->
                            <div class="col-md-6 mb-3">
                                <label for="section_name" class="form-label">Section Name <span class="text-danger">*</span></label>
                                <input type="text" name="section_name" class="form-control" value="{{ old('section_name') }}" required>
                            </div>

                            <!-- Section Capacity -->
                            <div class="col-md-6 mb-3">
                                <label for="section_capacity" class="form-label">Section Capacity</label>
                                <input type="number" name="section_capacity" class="form-control" value="{{ old('section_capacity', 40) }}">
                            </div>

                            <!-- Section Teacher -->
                            <div class="col-md-6 mb-3">
                                <label for="section_teacher_id" class="form-label">Section Teacher</label>
                                <select name="section_teacher_id" class="form-select">
                                    <option value="">-- Select Teacher --</option>
                                    @foreach($teachers as $teacher)
                                        <option value="{{ $teacher->id }}" {{ old('section_teacher_id') == $teacher->id ? 'selected' : '' }}>
                                            {{ $teacher->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Status -->
                            <div class="col-md-6 mb-3">
                                <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                                <select name="status" class="form-select" required>
                                    <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>
                        </div>

                        <!-- Buttons -->
                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('sections.index') }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left-circle"></i> Back
                            </a>
                            <button type="submit" class="btn btn-success">
                                <i class="bi bi-save2"></i> Save Section
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
