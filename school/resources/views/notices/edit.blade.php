@extends('layouts.layouts')

@section('content')
<div class="container">
    <h2>✏️ Edit Notice</h2>

    <form action="{{ route('notices.update', $notice) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label class="form-label">📝 Title</label>
            <input type="text" name="title" class="form-control" required value="{{ old('title', $notice->title) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">📄 Description</label>
            <textarea name="description" class="form-control" rows="4" required>{{ old('description', $notice->description) }}</textarea>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">📅 Notice Date</label>
                <input type="date" name="notice_date" class="form-control" required value="{{ old('notice_date', $notice->notice_date) }}">
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">📅 Expiry Date</label>
                <input type="date" name="expiry_date" class="form-control" value="{{ old('expiry_date', $notice->expiry_date) }}">
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">🔘 Status</label>
            <select name="status" class="form-select" required>
                <option value="active" {{ $notice->status == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ $notice->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <div class="mt-4 d-flex justify-content-between">
            <a href="{{ route('notices.index') }}" class="btn btn-secondary">Back</a>
            <button type="submit" class="btn btn-success">Update Notice</button>
        </div>
    </form>
</div>
@endsection
