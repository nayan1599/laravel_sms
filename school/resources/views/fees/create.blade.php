@extends('layouts.layouts')
@section('title','Add New Fee')
@section('content')
<div class="container">
    <h2 class="main-title">➕ Add New Fee</h2>

    {{-- Validation Errors --}}
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('fees.store') }}" method="POST" class="row g-3">
        @csrf

        {{-- Student --}}
        <div class="col-md-6">
            <label class="form-label">👨‍🎓 Student</label>
            <select name="student_id" class="form-select" required>
                <option value="">-- Select Student --</option>
                @foreach($students as $student)
                <option value="{{ $student->id }}" {{ old('student_id')==$student->id?'selected':'' }}>
                    {{ $student->name }}
                </option>
                @endforeach
            </select>
        </div>

        {{-- Fee Type --}}
        <div class="col-md-6">
            <label class="form-label">💳 Fee Type</label>
            <select name="fee_type_id" id="fee_type_select" class="form-select" required>
                <option value="">-- Select Fee Type --</option>
                @foreach($feeTypes as $type)
                <option value="{{ $type->id }}"
                    data-amount="{{ $type->default_amount ?? 0 }}"
                    {{ old('fee_type_id')==$type->id?'selected':'' }}>
                    {{ $type->name }}
                </option>
                @endforeach
            </select>
        </div>

        {{-- Month-Year --}}
        <div class="col-md-6">
            <label class="form-label">📅 Month-Year</label>
            <input type="month" name="month_year" class="form-control"
                value="{{ old('month_year', now()->format('Y-m')) }}" required>
        </div>
        {{-- Amount Due ফিল্ডটা required করলাম --}}
        <div class="col-md-6">
            <label class="form-label">💰 Amount Due (৳) <span class="text-danger">*</span></label>
            <input type="number" name="amount_due" id="amount_due" class="form-control"
                step="0.01" value="{{ old('amount_due', 0) }}" placeholder="e.g. 1500" required>
        </div>

        {{-- Discount ফিল্ডের পাশে হিন্ট যোগ করলাম (ইউজার বুঝতে সুবিধা হবে) --}}
        <div class="col-md-6">
            <label class="form-label"> Discount <small class="text-muted">(৳)</small></label>
            <input type="number" name="discount" id="discount" class="form-control"
                step="0.01" value="{{ old('discount', 0) }}" placeholder="e.g. 50 or">
        </div>

        {{-- Fine --}}
        <div class="col-md-6">
            <label class="form-label">⚠ Fine (৳)</label>
            <input type="number" name="fine" id="fine" class="form-control"
                step="0.01" value="{{ old('fine', 0) }}" placeholder="0">
        </div>



        {{-- Due Date --}}
        <div class="col-md-6">
            <label class="form-label">📅 Due Date</label>
            <input type="date" name="due_date" class="form-control"
                value="{{ old('due_date', now()->toDateString()) }}" required>
        </div>

        {{-- Payment Date --}}
        <div class="col-md-6">
            <label class="form-label">💳 Payment Date</label>
            <input type="date" name="payment_date" class="form-control"
                value="{{ old('payment_date',now()->toDateString()) }}">
        </div>

        {{-- Payment Method --}}
        <div class="col-md-6">
            <label class="form-label">💰 Payment Method</label>
            <select name="payment_method" class="form-select">
                @foreach(['CASH','BKASH','NAGAD','BANK','CARD','OTHER'] as $method)
                <option value="{{ $method }}" {{ old('payment_method')==$method?'selected':'' }}>
                    {{ $method }}
                </option>
                @endforeach
            </select>
        </div>

        {{-- Transaction ID --}}
        <div class="col-md-6">
            <label class="form-label">🆔 Transaction ID</label>
            <input type="text" name="transaction_id" class="form-control"
                value="{{ old('transaction_id') }}" placeholder="Optional">
        </div>

        {{-- Remarks --}}
        <div class="col-md-12">
            <label class="form-label">📝 Remarks</label>
            <textarea name="remarks" class="form-control" rows="2" placeholder="Optional">{{ old('remarks') }}</textarea>
        </div>

        {{-- Submit Buttons --}}
        <div class="col-12 d-flex justify-content-between mt-4">
            <a href="{{ route('fees.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left-circle"></i> Back
            </a>
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save2"></i> Save Fee
            </button>
        </div>
    </form>
</div>
@endsection