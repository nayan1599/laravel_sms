@extends('layouts.layouts')

@section('content')
<div class="container-fluid py-4">

    {{-- Page Header --}}
    <div class="mb-4">
        <h3 class="fw-bold main-title">Add Fee Type</h3>
        <small class="text-muted">নতুন ফি টাইপ যোগ করুন</small>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('fee-types.store') }}" method="POST">
                @csrf

                <div class="row g-3">

                    {{-- Fee Name --}}
                    <div class="col-md-6">
                        <label class="form-label">Fee Type Name <span class="text-danger">*</span></label>
                        <input type="text"
                               name="name"
                               class="form-control"
                               value="{{ old('name') }}"
                               required>
                    </div>

                    {{-- Fee Name Bangla --}}
                    <div class="col-md-6">
                        <label class="form-label">Fee Name (বাংলা)</label>
                        <input type="text"
                               name="name_bn"
                               class="form-control"
                               value="{{ old('name_bn') }}">
                    </div>

                    {{-- Code --}}
                    <div class="col-md-4">
                        <label class="form-label">Code</label>
                        <input type="text"
                               name="code"
                               class="form-control"
                               placeholder="ADM / TUI"
                               value="{{ old('code') }}">
                    </div>

                    {{-- Frequency --}}
                    <div class="col-md-4">
                        <label class="form-label">Frequency <span class="text-danger">*</span></label>
                        <select name="frequency" class="form-select" required>
                            <option value="">-- Select Frequency --</option>
                            @foreach(['ONE_TIME','MONTHLY','QUARTERLY','ANNUAL','PER_TERM','AS_NEEDED'] as $freq)
                                <option value="{{ $freq }}"
                                    {{ old('frequency') == $freq ? 'selected' : '' }}>
                                    {{ str_replace('_',' ',$freq) }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Recurring --}}
                    <div class="col-md-4">
                        <label class="form-label">Recurring? <span class="text-danger">*</span></label>
                        <select name="is_recurring" class="form-select" required>
                            <option value="0" {{ old('is_recurring') == '0' ? 'selected' : '' }}>No</option>
                            <option value="1" {{ old('is_recurring') == '1' ? 'selected' : '' }}>Yes</option>
                        </select>
                    </div>

                    {{-- Refundable --}}
                    <div class="col-md-4">
                        <label class="form-label">Refundable? <span class="text-danger">*</span></label>
                        <select name="is_refundable" class="form-select" required>
                            <option value="0" {{ old('is_refundable') == '0' ? 'selected' : '' }}>No</option>
                            <option value="1" {{ old('is_refundable') == '1' ? 'selected' : '' }}>Yes</option>
                        </select>
                    </div>

                    {{-- Status --}}
                    <div class="col-md-4">
                        <label class="form-label">Status <span class="text-danger">*</span></label>
                        <select name="is_active" class="form-select" required>
                            <option value="1" selected>Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>

                    {{-- Description --}}
                    <div class="col-12">
                        <label class="form-label">Description</label>
                        <textarea name="description"
                                  rows="3"
                                  class="form-control">{{ old('description') }}</textarea>
                    </div>

                    {{-- Buttons --}}
                    <div class="col-12">
                        <button type="submit" class="btn btn-success">
                            Save Fee Type
                        </button>
                        <a href="{{ route('fee-types.index') }}"
                           class="btn btn-secondary ms-2">
                            Back
                        </a>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
@endsection
