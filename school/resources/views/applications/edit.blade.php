@extends('layouts.layouts')
@section('title','Edit Student Applications')
@section('content')

<div class="container-fluid py-4">
    <h3 class="fw-bold mb-3">Edit Student Application</h3>
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <form method="POST" action="{{ route('applications.update', $data->id) }}">
                @csrf
                @method('PUT')
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Student Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $data->name }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Phone</label>
                        <input type="text" name="phone" class="form-control" value="{{ $data->phone }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Gender</label>
                        <select name="gender" class="form-select" required>
                            <option value="male" >{{ $data->gender}}</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Class</label>
                        <select name="class_id" class="form-select" required>
                            @foreach($classes as $class)
                            <option value="{{ $class->id }}" {{ $data->class_id == $class->id ? 'selected' : '' }}>{{ $class->class_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Section</label>
                        <select name="section_id" class="form-select">
                            <option value="">Select Section</option>
                            @foreach($sections as $section)
                            <option value="{{ $section->id }}" {{ $data->section_id == $section->id ? 'selected' : '' }}>{{ $section->section_name }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <div class="col-md-6">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select" required>
                        <option value="pending" {{ $data->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="approved" {{ $data->status == 'approved' ? 'selected' : '' }}>Approved</option>
                        <option value="rejected" {{ $data->status == 'rejected' ? 'selected' : '' }}>   Rejected</option>
                    </select>
                </div>
                <div class="mt-4 text-end">
                    <button class="btn btn-primary px-4">Update Application</button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection