@extends('layouts.layouts')

@section('title', 'Edit User')

@section('content')
<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold main-title">✏️ Edit User</h3>
        
    </div>

    <div class="shadow-sm border-0">
        <div class="card-body">
            <form method="POST"
                  action="{{ route('users.update', $user->id) }}"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">

                    {{-- Name --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Name</label>
                        <input type="text" name="name"
                               class="form-control @error('name') is-invalid @enderror"
                               value="{{ old('name', $user->name) }}">
                        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    {{-- Email --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Email</label>
                        <input type="email" name="email"
                               class="form-control @error('email') is-invalid @enderror"
                               value="{{ old('email', $user->email) }}">
                        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    {{-- Phone --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Phone Number</label>
                        <input type="text" name="phone_number"
                               class="form-control @error('phone_number') is-invalid @enderror"
                               value="{{ old('phone_number', $user->phone_number) }}">
                        @error('phone_number') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    {{-- Role --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Role</label>
                        <select name="role"
                                class="form-select @error('role') is-invalid @enderror">
                            <option value="admin" {{ $user->role=='admin' ? 'selected' : '' }}>Admin</option>
                            <option value="teacher" {{ $user->role=='teacher' ? 'selected' : '' }}>Teacher</option>
                            <option value="student" {{ $user->role=='student' ? 'selected' : '' }}>Student</option>
                        </select>
                        @error('role') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    {{-- Photo --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Profile Photo</label>
                        <input type="file" name="photo"
                               class="form-control @error('photo') is-invalid @enderror">

                        @if($user->photo)
                            <div class="mt-2">
                                <img src="{{ asset($user->photo) }}"
                                     width="80"
                                     class="rounded-circle img-thumbnail"
                                     alt="Current Photo">
                            </div>
                        @endif

                        @error('photo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    {{-- Password --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">New Password</label>
                        <input type="password" name="password"
                               class="form-control @error('password') is-invalid @enderror"
                               placeholder="Leave blank to keep current password">
                        @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    {{-- Confirm Password --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Confirm Password</label>
                        <input type="password" name="password_confirmation"
                               class="form-control">
                    </div>

                </div>

                <div class="d-flex justify-content-end gap-2 mt-3">
                    <button type="reset" class="btn btn-light">Reset</button>
                    <button type="submit" class="btn btn-primary px-4">
                        🔄 Update User
                    </button>
                </div>

            </form>
        </div>
    </div>

</div>
@endsection
