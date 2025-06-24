@extends('layouts.layouts')

@section('content')
<div class="container">
    <h2>{{ isset($student) ? 'Edit Student' : 'Add New Student' }}</h2>

    <form action="{{ isset($student) ? route('students.update', $student->id) : route('students.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($student)) @method('PUT') @endif

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" value="{{ old('name', $student->name ?? '') }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email', $student->email ?? '') }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Phone</label>
            <input type="text" name="phone" value="{{ old('phone', $student->phone ?? '') }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Date of Birth</label>
            <input type="date" name="dob" value="{{ old('dob', $student->dob ?? '') }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Gender</label>
            <select name="gender" class="form-control">
                <option value="">Select</option>
                <option value="Male" {{ (old('gender', $student->gender ?? '') == 'Male') ? 'selected' : '' }}>Male</option>
                <option value="Female" {{ (old('gender', $student->gender ?? '') == 'Female') ? 'selected' : '' }}>Female</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Class</label>
            <input type="text" name="class" value="{{ old('class', $student->class ?? '') }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Section</label>
            <input type="text" name="section" value="{{ old('section', $student->section ?? '') }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Roll</label>
            <input type="text" name="roll" value="{{ old('roll', $student->roll ?? '') }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Address</label>
            <textarea name="address" class="form-control">{{ old('address', $student->address ?? '') }}</textarea>
        </div>

        <div class="mb-3">
            <label>Photo</label>
            <input type="file" name="photo" class="form-control">
            @if(isset($student) && $student->photo)
                <img src="{{ asset($student->photo) }}" width="80">
            @endif
        </div>

        <button class="btn btn-primary">{{ isset($student) ? 'Update' : 'Add' }}</button>
    </form>
</div>
@endsection
