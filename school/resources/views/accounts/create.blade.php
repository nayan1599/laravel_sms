@extends('layouts.app')
@section('title', 'Add New Transaction')

@section('content')

<div class="card shadow-sm border-0">
    <div class="card-header bg-light">
        <h5 class="mb-0 fw-semibold">
            <i class="bi bi-plus-circle me-2"></i>Add New Transaction
        </h5>
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('accounts.store') }}">
            @csrf

            <div class="row g-3">
 
                <!-- Type -->
                <div class="col-md-6">
                    <label class="form-label fw-semibold">
                        Type <span class="text-danger">*</span>
                    </label>
                    <select name="type" class="form-select @error('type') is-invalid @enderror" 
                            required>
                        <option value="" disabled selected>-- Select Type --</option>
                        <option value="income" {{ old('type') === 'income' ? 'selected' : '' }}>
                            💰 Income
                        </option>
                        <option value="expense" {{ old('type') === 'expense' ? 'selected' : '' }}>
                            💸 Expense
                        </option>
                    </select>
                    @error('type')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
 
                <!-- Title / Category -->
                <div class="col-md-6">
                    <label class="form-label fw-semibold">
                        Title / Category <span class="text-danger">*</span>
                    </label>
                    <input type="text"
                           name="title"
                           class="form-control @error('title') is-invalid @enderror"
                           value="{{ old('title') }}"
                           placeholder="e.g. Salary, Electricity Bill, Tuition Fee"
                           required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Amount -->
                <div class="col-md-6">
                    <label class="form-label fw-semibold">
                        Amount <span class="text-danger">*</span>
                    </label>
                    <div class="input-group">
                        <span class="input-group-text">৳</span>
                        <input type="number"
                               name="amount"
                               step="0.01"
                               min="0.01"
                               class="form-control @error('amount') is-invalid @enderror"
                               value="{{ old('amount') }}"
                               placeholder="0.00"
                               required>
                    </div>
                    @error('amount')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Date -->
                <div class="col-md-6">
                    <label class="form-label fw-semibold">
                        Date <span class="text-danger">*</span>
                    </label>
                    <input type="date"
                           name="date"
                           class="form-control @error('date') is-invalid @enderror"
                           value="{{ old('date', now()->format('Y-m-d')) }}"
                           required>
                    @error('date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Description -->
                <div class="col-12">
                    <label class="form-label fw-semibold">Description / Note</label>
                    <textarea name="description"
                              rows="3"
                              class="form-control @error('description') is-invalid @enderror"
                              placeholder="Additional details, reference number, payment method...">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            <!-- Form Actions -->
            <div class="d-flex justify-content-end gap-2 mt-4">
                <a href="{{ route('accounts.index') }}" class="btn btn-outline-secondary px-4">
                    Cancel
                </a>
                <button type="submit" class="btn btn-primary px-4">
                    <i class="bi bi-save me-1"></i>
                    Save Transaction
                </button>
            </div>

        </form>
    </div>
</div>

@endsection