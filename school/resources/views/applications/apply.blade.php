@extends('layouts.web')
@section('title','Student Admission')
@section('content')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">

            <div class="card shadow border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h4 class="mb-0 fw-bold">Student Admission Application Form</h4>
                    <small>Please fill in all required information carefully</small>
                </div>

                <div class="card-body p-4">

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show">
                            {{ session('success') }}
                            <button class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <form method="POST" action="{{ url('/apply') }}">
                        @csrf

                        <!-- ================= Student Information ================= -->
                        <h5 class="mb-3 text-primary">Student Information</h5>
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Student Name *</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Date of Birth *</label>
                                <input type="date" name="dob" class="form-control" required>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label fw-semibold">Gender *</label>
                                <select name="gender" class="form-select" required>
                                    <option value="">Select</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label fw-semibold">Religion</label>
                                <input type="text" name="religion" class="form-control">
                            </div>

                            <div class="col-md-4">
                                <label class="form-label fw-semibold">Blood Group</label>
                                <select name="blood_group" class="form-select">
                                    <option value="">Select</option>
                                    <option>A+</option><option>A-</option>
                                    <option>B+</option><option>B-</option>
                                    <option>O+</option><option>O-</option>
                                    <option>AB+</option><option>AB-</option>
                                </select>
                            </div>
                        </div>

                        <!-- ================= Academic Information ================= -->
                        <h5 class="mb-3 text-primary">Academic Information</h5>
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Applying Class *</label>
                                <select name="class_id" class="form-select" required>
                                    <option value="">Select Class</option>
                                    @foreach($classes as $class)
                                        <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Previous School</label>
                                <input type="text" name="previous_school" class="form-control">
                            </div>
                        </div>

                        <!-- ================= Guardian Information ================= -->
                        <h5 class="mb-3 text-primary">Guardian Information</h5>
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Father's Name *</label>
                                <input type="text" name="father_name" class="form-control" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Mother's Name *</label>
                                <input type="text" name="mother_name" class="form-control" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Guardian Phone *</label>
                                <input type="text" name="phone" class="form-control" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Guardian Occupation</label>
                                <input type="text" name="guardian_occupation" class="form-control">
                            </div>
                        </div>

                        <!-- ================= Address ================= -->
                        <h5 class="mb-3 text-primary">Address Information</h5>
                        <div class="row g-3 mb-4">
                            <div class="col-md-12">
                                <label class="form-label fw-semibold">Present Address *</label>
                                <textarea name="address" class="form-control" rows="2" required></textarea>
                            </div>
                        </div>

                        <!-- ================= Submit ================= -->
                        <div class="text-end mt-4">
                            <button type="submit" class="btn btn-success px-5">
                                <i class="bi bi-send-check"></i> Submit Application
                            </button>
                        </div>

                    </form>

                </div>

                <div class="card-footer text-center small text-muted">
                    © {{ date('Y') }} School Admission System
                </div>

            </div>

        </div>
    </div>
</div>

@endsection
