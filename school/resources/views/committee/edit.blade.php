@extends('layouts.layouts')

@section('content')
<div class="container">
    <h2 class="mb-4">Edit Committee Member</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error) <li>{{ $error }}</li> @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('committees.update', $committee->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Name <span class="text-danger">*</span></label>
            <input type="text" name="name" value="{{ old('name', $committee->name) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Designation</label>
            <input type="text" name="designation" value="{{ old('designation', $committee->designation) }}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" value="{{ old('email', $committee->email) }}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Phone</label>
            <input type="text" name="phone" value="{{ old('phone', $committee->phone) }}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Address</label>
            <textarea name="address" class="form-control">{{ old('address', $committee->address) }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-select" required>
                <option value="active" {{ old('status', $committee->status) == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ old('status', $committee->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Current Photo</label><br>
            @if($committee->profile_photo)
                <img src="{{ asset('storage/' . $committee->profile_photo) }}" width="100" height="100" style="object-fit: cover; border-radius: 8px;">
            @else
                <span>No Photo Uploaded</span>
            @endif
        </div>

        <div class="mb-3">
            <label class="form-label">Change Photo</label>
            <input type="file" name="profile_photo" class="form-control" accept="image/*">
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('committees.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
