@extends('layouts.layouts')

@section('content')
<div class="container">
    <h2 class="main-title">➕ Add New Fee</h2>

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

        <!-- Student & Class -->
        <div class="col-md-6">
            <label class="form-label">👨‍🎓 Student</label>
            <select name="student_id" class="form-select" required>
                <option value="">-- Select Student --</option>
                @foreach($students as $student)
                    <option value="{{ $student->id }}" {{ old('student_id') == $student->id ? 'selected' : '' }}>
                        {{ $student->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-6">
            <label class="form-label">🏫 Class</label>
            <select name="class_id" class="form-select" required>
                <option value="">-- Select Class --</option>
                @foreach($classes as $class)
                    <option value="{{ $class->id }}" {{ old('class_id') == $class->id ? 'selected' : '' }}>
                        {{ $class->class_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Fee Type & Amount -->
        <div class="col-md-6">
            <label class="form-label">💳 Fee Type</label>
            <select name="fee_type" class="form-select" id="fee_type_select" required>
                <option value="">-- Select Type --</option>
                @foreach($feetypes as $feetype)
                    <option 
                        value="{{ $feetype->name }}" 
                        data-amount="{{ $feetype->default_amount }}"
                        {{ old('fee_type') == $feetype->name ? 'selected' : '' }}>
                        {{ $feetype->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-6">
            <label class="form-label">💰 Amount (৳)</label>
            <input type="number" name="amount" step="0.01" id="amount_field" class="form-control" value="{{ old('amount') }}" placeholder="e.g. 1500" required>
        </div>

        <!-- Due Date & Payment Date -->
        <div class="col-md-6">
            <label class="form-label">📅 Due Date</label>
            <input type="date" name="due_date" class="form-control" value="{{ old('due_date') }}" required>
        </div>

        <div class="col-md-6">
            <label class="form-label">💳 Payment Date (optional)</label>
            <input type="date" name="payment_date" class="form-control" value="{{ old('payment_date') }}">
        </div>

        <!-- Payment Status & Paid Amount -->
        <div class="col-md-6">
            <label class="form-label">📌 Payment Status</label>
            <select name="payment_status" class="form-select" required>
                <option value="pending" {{ old('payment_status') == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="paid" {{ old('payment_status') == 'paid' ? 'selected' : '' }}>Paid</option>
                <option value="partial" {{ old('payment_status') == 'partial' ? 'selected' : '' }}>Partial</option>
                <option value="overdue" {{ old('payment_status') == 'overdue' ? 'selected' : '' }}>Overdue</option>
            </select>
        </div>

        <div class="col-md-6">
            <label class="form-label">💵 Paid Amount (৳)</label>
            <input type="number" name="paid_amount" step="0.01" class="form-control" value="{{ old('paid_amount', 0) }}">
        </div>

        <!-- Receipt & Remarks -->
        <div class="col-md-6">
            <label class="form-label">🧾 Receipt Number</label>
            <input type="text" name="receipt_number" class="form-control" value="{{ old('receipt_number') }}" placeholder="e.g. RCV-2025001">
        </div>

        <div class="col-md-6">
            <label class="form-label">📝 Remarks (optional)</label>
            <textarea name="remarks" class="form-control" rows="2" placeholder="Any notes...">{{ old('remarks') }}</textarea>
        </div>

        <!-- Buttons -->
        <div class="col-12 d-flex justify-content-between mt-4">
            <a href="{{ route('fees.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left-circle"></i> Back</a>
            <button type="submit" class="btn btn-primary"><i class="bi bi-save2"></i> Save Fee</button>
        </div>
    </form>
</div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const feeTypeSelect = document.getElementById('fee_type_select');
        const amountField = document.getElementById('amount_field');
        const paymentDateInput = document.querySelector('input[name="payment_date"]');
        const dueDateInput = document.querySelector('input[name="due_date"]');

        // Fee type change → auto fill amount
        if (feeTypeSelect && amountField) {
            feeTypeSelect.addEventListener('change', function () {
                const selectedOption = feeTypeSelect.options[feeTypeSelect.selectedIndex];
                const defaultAmount = selectedOption.getAttribute('data-amount');
                amountField.value = defaultAmount || '';
            });
        }

        // Payment Date → Auto-fill Due Date (add 30 days)
        if (paymentDateInput && dueDateInput) {
            paymentDateInput.addEventListener('change', function () {
                const paymentDate = new Date(paymentDateInput.value);
                if (!isNaN(paymentDate.getTime())) {
                    const dueDate = new Date(paymentDate);
                    dueDate.setDate(dueDate.getDate() + 30); // Add 30 days

                    // Format YYYY-MM-DD
                    const yyyy = dueDate.getFullYear();
                    const mm = String(dueDate.getMonth() + 1).padStart(2, '0');
                    const dd = String(dueDate.getDate()).padStart(2, '0');
                    dueDateInput.value = `${yyyy}-${mm}-${dd}`;
                }
            });
        }
    });
</script>

