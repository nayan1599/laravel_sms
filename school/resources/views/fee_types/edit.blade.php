@extends('layouts.layouts')
@section('title','Edit Fee Type')

@section('content')
<div class="container-fluid">
    <div class=" justify-content-center">
        <div class="">
            <h5 class="mb-0 main-title"> Edit Fee Type </h5>
            <div class="card-body">
                <form action="{{ route('fee-types.update', $feeType->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row g-3">

                        <!-- Fee Type Name -->
                        <div class="col-md-6">
                            <label class="form-label ">
                                Fee Type Name <span class="text-danger">*</span>
                            </label>
                            <input type="text"
                                name="name"
                                class="form-control"
                                value="{{ old('name', $feeType->name) }}"
                                required>
                        </div>

                        <!-- Class -->
                        <div class="col-md-6">
                            <label class="form-label ">Class</label>
                            <select name="class_id" class="form-select">
                                <option value="">-- Select Class --</option>
                                @foreach($classModel as $class)
                                <option value="{{ $class->id }}"
                                    {{ old('class_id', $feeType->class_id) == $class->id ? 'selected' : '' }}>
                                    {{ $class->class_name }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Expiry Date -->
                        <div class="col-md-6">
                            <label class="form-label ">Expiry Date</label>
                            <input type="date"
                                name="expiry_date"
                                class="form-control"
                                value="{{ old('expiry_date', $feeType->expiry_date) }}">
                        </div>

                        <!-- Default Amount -->
                        <div class="col-md-6">
                            <label class="form-label ">
                                Default Amount <span class="text-danger">*</span>
                            </label>
                            <input type="number"
                                step="0.01"
                                name="default_amount"
                                class="form-control"
                                value="{{ old('default_amount', $feeType->default_amount) }}"
                                required>
                        </div>

                    </div>

                    <!-- Buttons -->
                    <div class="mt-4 d-flex justify-content-end gap-2">
                        <a href="{{ route('fee-types.index') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-left"></i> Back
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-circle"></i> Update Fee Type
                        </button>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>

@endsection