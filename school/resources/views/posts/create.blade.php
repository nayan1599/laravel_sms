@extends('layouts.layouts')

@section('content')
<div class="container py-4">
    <h2 class="mb-4 text-primary fw-bold border-bottom pb-2">Add New Post</h2>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" novalidate>
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label fw-semibold">Title <span class="text-danger">*</span></label>
            <input type="text" id="title" name="title"
                class="form-control @error('title') is-invalid @enderror"
                value="{{ old('title') }}" required>
            @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="slug" class="form-label fw-semibold">Slug <span class="text-danger">*</span></label>
            <input type="text" id="slug" name="slug"
                class="form-control @error('slug') is-invalid @enderror"
                value="{{ old('slug') }}" required>
            @error('slug')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label fw-semibold">Category <span class="text-danger">*</span></label>
            <select id="category_id" name="category_id"
                class="form-select @error('category_id') is-invalid @enderror" required>
                <option value="">-- Select Category --</option>
                @foreach($categories as $cat)
                <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>
                    {{ $cat->name }}
                </option>
                @endforeach
            </select>
            @error('category_id')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="excerpt" class="form-label fw-semibold">Excerpt</label>
            <textarea id="excerpt" name="excerpt" rows="3"
                class="form-control @error('excerpt') is-invalid @enderror">{{ old('excerpt') }}</textarea>
            @error('excerpt')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="content" class="form-label fw-semibold">Content</label>
            <textarea id="content" name="content" rows="6"
                class="form-control @error('content') is-invalid @enderror">{{ old('content') }}</textarea>
            @error('content')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="feature_image" class="form-label fw-semibold">Feature Image</label>
            <input type="file" id="feature_image" name="feature_image"
                class="form-control @error('feature_image') is-invalid @enderror" accept="image/*">
            @error('feature_image')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="status" class="form-label fw-semibold">Status</label>
            <select id="status" name="status"
                class="form-select @error('status') is-invalid @enderror" required>
                <option value="1" {{ old('status', 1) == 1 ? 'selected' : '' }}>Published</option>
                <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Draft</option>
            </select>
            @error('status')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">
            <i class="bi bi-check2-circle me-1"></i> Save Post
        </button>
        <a href="{{ route('posts.index') }}" class="btn btn-secondary ms-2">Cancel</a>
    </form>
</div>
@endsection
