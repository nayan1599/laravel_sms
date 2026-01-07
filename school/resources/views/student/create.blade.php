@extends('layouts.app')

@section('title', 'Apply .leave')

@section('content')
<div class="container-fluid py-4">

    {{-- Page Header --}}
    <div class="mb-4">
        <h4 class="fw-bold mb-1">Apply for .leave</h4>
        <small class="text-muted">
            ছুটির জন্য নিচের ফর্মটি পূরণ করুন
        </small>
    </div>

    {{-- Form Card --}}
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">

                    <form action="{{ route('student.store') }}" method="POST">
                        @csrf

                        {{-- .leave From Date --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                .leave From <span class="text-danger">*</span>
                            </label>
                            <input type="date" name="from_date"
                                class="form-control @error('from_date') is-invalid @enderror"
                                value="{{ old('from_date') }}">
                            @error('from_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- .leave To Date --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                .leave To <span class="text-danger">*</span>
                            </label>
                            <input type="date" name="to_date"
                                class="form-control @error('to_date') is-invalid @enderror"
                                value="{{ old('to_date') }}">
                            @error('to_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- {{$teacher}} -->

                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                Teacher Select করুন <span class="text-danger">*</span>
                            </label>



                            <select name="teacher_id" class="form-select" required>
                                <option value="">-- Teacher Select করুন --</option>
 
                                @foreach ($teacher as $bloodgroup)
                                <option value="{{ $bloodgroup->id }}"
                                    {{ old('blood_group', $student->blood_group ?? '') == $bloodgroup->name ? 'selected' : '' }}>
                                    {{ $bloodgroup->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>


                        {{-- Reason --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                Reason <span class="text-danger">*</span>
                            </label>
                            <textarea name="reason" rows="4"
                                class="form-control @error('reason') is-invalid @enderror"
                                placeholder="ছুটির কারণ লিখুন...">{{ old('reason') }}</textarea>
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
                            <a href="{{ route('student.userlist') }}" class="btn btn-outline-secondary">
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