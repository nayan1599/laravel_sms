@extends('layouts.layouts')
 
@section('content')
<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold main-title">➕ Create New User</h3>
        
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="row">

                    {{-- Name --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Name</label>
                        <input type="text" name="name"
                               class="form-control @error('name') is-invalid @enderror"
                               value="{{ old('name') }}" placeholder="Enter full name">
                        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    {{-- Email --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Email</label>
                        <input type="email" name="email"
                               class="form-control @error('email') is-invalid @enderror"
                               value="{{ old('email') }}" placeholder="Enter email address">
                        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    {{-- Phone --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Phone Number</label>
                        <input type="text" name="phone_number"
                               class="form-control @error('phone_number') is-invalid @enderror"
                               value="{{ old('phone_number') }}" placeholder="01XXXXXXXXX">
                        @error('phone_number') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    {{-- Role --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Role</label>
                        <select name="role"
                                class="form-select @error('role') is-invalid @enderror">
                            <option value="">Select Role</option>
                            <option value="admin" {{ old('role')=='admin' ? 'selected' : '' }}>Admin</option>
                            <option value="teacher" {{ old('role')=='teacher' ? 'selected' : '' }}>Teacher</option>
                            <option value="student" {{ old('role')=='student' ? 'selected' : '' }}>Student</option>
                        </select>
                        @error('role') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    {{-- Photo --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Profile Photo</label>
                        <input type="file" name="photo"
                               class="form-control @error('photo') is-invalid @enderror">
                        @error('photo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    {{-- Password --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Password</label>
                        <input type="password" name="password"
                               class="form-control @error('password') is-invalid @enderror"
                               placeholder="********">
                        @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    {{-- Confirm Password --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Confirm Password</label>
                        <input type="password" name="password_confirmation"
                               class="form-control"
                               placeholder="********">
                    </div>

                </div>

                <div class="d-flex justify-content-end gap-2 mt-3">
                    <button type="reset" class="btn btn-light">Reset</button>
                    <button type="submit" class="btn btn-success px-4">
                        💾 Save User
                    </button>
                </div>

            </form>
        </div>
    </div>

</div>
@endsection
