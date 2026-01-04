@extends('layouts.layouts')

@section('content')
<div class="container">
    <h2>Edit Fee Type</h2>

    <form action="{{ route('fee-types.update', $feeType->id) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label class="form-label">Fee Type Name</label>
            <input type="text" name="name" class="form-control" value="{{ $feeType->name }}" required>
        </div>

<!-- class -->
        <div class="mb-3">
            <label class="form-label">Class</label>
            <select name="class_id" class="form-select">
                <option value="">-- Select Class --</option>
                @foreach($classModel as $class)
                    <option value="{{ $class->id }}" {{ $feeType->class_id == $class->id ? 'selected' : '' }}>
                        {{ $class->class_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Default Amount</label>
            <input type="number" step="0.01" name="default_amount" class="form-control" value="{{ $feeType->default_amount }}" required>
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('fee-types.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
