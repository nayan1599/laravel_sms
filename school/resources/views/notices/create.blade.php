@extends('layouts.layouts')

@section('content')
<div class="container">
    <h2 class="main-title">➕ Add Notice</h2>

    <form action="{{ route('notices.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label">📝 Title</label>
            <input type="text" name="title" class="form-control" required value="{{ old('title') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">📄 Description</label>
            <textarea name="description" class="form-control" rows="4" required>{{ old('description') }}</textarea>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">📅 Notice Date</label>
                <input type="date" name="notice_date" class="form-control" required value="{{ old('notice_date') }}">
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">📅 Expiry Date</label>
                <input type="date" name="expiry_date" class="form-control" value="{{ old('expiry_date') }}">
            </div>
        </div>

        <!-- ✅ Image Field -->
        <div class="mb-3">
            <label class="form-label">🖼️ Upload Image</label>
            <input type="file" name="image" class="form-control" accept="image/*">
        </div>

        <div class="mb-3">
            <label class="form-label">🔘 Status</label>
            <select name="status" class="form-select" required>
                <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <div class="mt-4 d-flex justify-content-between">
            <a href="{{ route('notices.index') }}" class="btn btn-secondary">Back</a>
            <button type="submit" class="btn btn-success">Save Notice</button>
        </div>
    </form>
</div>
@endsection
