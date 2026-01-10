@extends('layouts.app')

@section('title', 'Apply Leave')

@section('content')
<div class="container-fluid py-4">

    {{-- Page Header --}}
    <div class="mb-4">
        <h4 class="fw-bold mb-1">Apply for Leave</h4>
        <small class="text-muted">
            ছুটির জন্য নিচের ফর্মটি পূরণ করুন
        </small>
    </div>

    {{-- Form Card --}}
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">

                    <form action="{{ route('leave.store') }}" method="POST">
                        @csrf

                        {{-- Leave Type --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                Leave Type <span class="text-danger">*</span>
                            </label>
                            <select name="leave_type"
                                class="form-select @error('leave_type') is-invalid @enderror" required>
                                <option value="">-- Select Leave Type --</option>
                                <option value="Sick" {{ old('leave_type') == 'Sick' ? 'selected' : '' }}>Sick</option>
                                <option value="Casual" {{ old('leave_type') == 'Casual' ? 'selected' : '' }}>Casual</option>
                                <option value="Emergency" {{ old('leave_type') == 'Emergency' ? 'selected' : '' }}>Emergency</option>
                            </select>
                            @error('leave_type')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Leave From Date --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                Leave From <span class="text-danger">*</span>
                            </label>
                            <input type="date" name="start_date"
                                class="form-control @error('start_date') is-invalid @enderror"
                                value="{{ old('start_date') }}" required>
                            @error('start_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Leave To Date --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                Leave To <span class="text-danger">*</span>
                            </label>
                            <input type="date" name="end_date"
                                class="form-control @error('end_date') is-invalid @enderror"
                                value="{{ old('end_date') }}" required>
                            @error('end_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Teacher Select --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                Teacher Select করুন <span class="text-danger">*</span>
                            </label>
                            <select name="teacher_id"
                                class="form-select @error('teacher_id') is-invalid @enderror" required>
                                <option value="">-- Teacher Select করুন --</option>
                                @foreach ($teacher as $teachers)
                                    <option value="{{ $teachers->id }}"
                                        {{ old('teacher_id') == $teachers->id ? 'selected' : '' }}>
                                        {{ $teachers->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('teacher_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Reason --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                Reason <span class="text-danger">*</span>
                            </label>
                            <textarea name="reason" rows="4"
                                class="form-control @error('reason') is-invalid @enderror"
                                placeholder="ছুটির কারণ লিখুন..." required>{{ old('reason') }}</textarea>
                            @error('reason')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Info Alert --}}
                        <div class="alert alert-info small">
                            <i class="bi bi-info-circle"></i>
                            আপনার আবেদনটি <strong>Teacher</strong> যাচাই করার পর
                            <strong>Approve / Reject</strong> করা হবে।
                        </div>

                        {{-- Buttons --}}
                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('leave.index') }}" class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-left"></i> Back
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-send"></i> Submit Application
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

</div>
@endsection
