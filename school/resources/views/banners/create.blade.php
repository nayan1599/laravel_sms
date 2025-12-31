@extends('layouts.layouts')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow rounded-4">
                <div class="card-header bg-primary text-white rounded-top-4">
                    <h4 class="mb-0">Add / Edit Banner</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('banners.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="title" class="form-label fw-semibold">Title <span class="text-danger">*</span></label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $banner->title ?? '') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="subtitle" class="form-label fw-semibold">Subtitle</label>
                            <input type="text" name="subtitle" id="subtitle" class="form-control" value="{{ old('subtitle', $banner->subtitle ?? '') }}">
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label fw-semibold">Banner Image</label>
                            <input type="file" name="image" id="image" class="form-control">
                            @if(isset($banner) && $banner->image)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $banner->image) }}" alt="Banner Image" style="height:60px;" class="rounded shadow">
                                </div>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label fw-semibold">Status</label>
                            <select name="status" id="status" class="form-select">
                                <option value="1" {{ old('status', $banner->status ?? 1) == 1 ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ old('status', $banner->status ?? 1) == 0 ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-success px-4">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
