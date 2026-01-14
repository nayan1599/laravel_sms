@extends('layouts.app')
@section('title', 'Account Categories')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header bg-light">
        <h5 class="mb-0 fw-semibold">
            <i class="bi bi-tags me-1"></i> Account Category Information
        </h5>
    </div>

    <form action="{{ route('account-categories.store') }}" method="POST">
        @csrf

        <div class="card-body">
            <div class="row g-3">

                <!-- Category Name -->
                <div class="col-md-6">
                    <label class="form-label fw-semibold">
                        Category Name <span class="text-danger">*</span>
                    </label>
                    <input type="text"
                           name="name"
                           value="{{ old('name', $account_category->name ?? '') }}"
                           class="form-control @error('name') is-invalid @enderror"
                           placeholder="e.g. Tuition Fee, Salary"
                           required>
                    <small class="text-muted">Accounting category name</small>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Type -->
                <div class="col-md-6">
                    <label class="form-label fw-semibold">
                        Category Type <span class="text-danger">*</span>
                    </label>
                    <select name="type" class="form-select @error('type') is-invalid @enderror" required>
                        <option value="">-- Select Type --</option>
                        <option value="income" {{ old('type', $account_category->type ?? '') == 'income' ? 'selected' : '' }}>
                            💰 Income
                        </option>
                        <option value="expense" {{ old('type', $account_category->type ?? '') == 'expense' ? 'selected' : '' }}>
                            💸 Expense
                        </option>
                    </select>
                    <small class="text-muted">Choose income or expense</small>
                    @error('type')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Description -->
                <div class="col-12">
                    <label class="form-label fw-semibold">Description</label>
                    <textarea name="description"
                              class="form-control @error('description') is-invalid @enderror"
                              rows="3"
                              placeholder="Short description about this category">{{ old('description', $account_category->description ?? '') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Status -->
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Status</label>
                    <select name="status" class="form-select">
                        <option value="1" {{ old('status', $account_category->status ?? 1) == 1 ? 'selected' : '' }}>
                            ✅ Active
                        </option>
                        <option value="0" {{ old('status', $account_category->status ?? 1) == 0 ? 'selected' : '' }}>
                            ❌ Inactive
                        </option>
                    </select>
                </div>

            </div>
        </div>

        <!-- Footer -->
        <div class="card-footer bg-light text-end">
            <button type="submit" class="btn btn-primary px-4">
                <i class="bi bi-save me-1"></i> Save Category
            </button>
            <a href="{{ route('account-categories.index') }}"
               class="btn btn-outline-secondary ms-2">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection