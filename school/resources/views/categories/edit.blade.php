@extends('layouts.layouts')

@section('content')
<div class="container py-4">
    <h2 class="mb-4 text-primary fw-bold border-bottom pb-2">Edit Category</h2>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('categories.update', $category) }}" method="POST" novalidate>
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label fw-semibold">Name <span class="text-danger">*</span></label>
            <input type="text" id="name" name="name" 
                class="form-control @error('name') is-invalid @enderror" 
                value="{{ old('name', $category->name) }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="slug" class="form-label fw-semibold">Slug <span class="text-danger">*</span></label>
            <input type="text" id="slug" name="slug" 
                class="form-control @error('slug') is-invalid @enderror" 
                value="{{ old('slug', $category->slug) }}" required>
            @error('slug')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label fw-semibold">Description</label>
            <textarea id="description" name="description" 
                class="form-control @error('description') is-invalid @enderror" rows="4">{{ old('description', $category->description) }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="status" class="form-label fw-semibold">Status</label>
            <select id="status" name="status" class="form-select @error('status') is-invalid @enderror" required>
                <option value="1" {{ old('status', $category->status) == 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ old('status', $category->status) == 0 ? 'selected' : '' }}>Inactive</option>
            </select>
            @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">
            <i class="bi bi-pencil-square me-1"></i> Update Category
        </button>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary ms-2">Cancel</a>
    </form>
</div>
@endsection
