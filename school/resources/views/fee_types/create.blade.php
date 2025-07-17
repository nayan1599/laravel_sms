@extends('layouts.layouts')

@section('content')
<div class="container">
    <h2 class="main-title mb-4">Add Fee Type</h2>

    <form action="{{ route('fee-types.store') }}" method="POST">
        @csrf
        <div class="row g-3">
            <div class="col-md-6 col-sm-12">
                <label for="name" class="form-label">Fee Type Name <span class="text-danger">*</span></label>
                <input type="text" name="name" id="name" class="form-control" required value="{{ old('name') }}">
            </div>

            <div class="col-md-6 col-sm-12">
                <label for="default_amount" class="form-label">Default Amount (৳) <span class="text-danger">*</span></label>
                <input type="number" step="0.01" name="default_amount" id="default_amount" class="form-control" required value="{{ old('default_amount') }}">
            </div>

            <div class="col-12">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" rows="4" class="form-control" placeholder="Optional description about this fee type">{{ old('description') }}</textarea>
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-success me-2">Save</button>
                <a href="{{ route('fee-types.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </form>
</div>
@endsection
