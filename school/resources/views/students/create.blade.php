@extends('layouts.layouts')

@section('content')
<div class="container">
    <h2 class="main-title">{{ isset($student) ? 'Edit Student' : 'Add New Student' }}</h2>

    <form action="{{ isset($student) ? route('students.update', $student->id) : route('students.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($student)) @method('PUT') @endif

        <div class="row">
            {{-- Personal Info --}}
            <div class="col-md-6 my-2">
                <label class="form-label">Full Name</label>
                <input type="text" name="name" value="{{ old('name', $student->name ?? '') }}" class="form-control">
            </div>
            <div class="col-md-6 my-2">
                <label class="form-label">Date of Birth</label>
                <input type="date" name="dob" value="{{ old('dob', $student->dob ?? '') }}" class="form-control">
            </div>
            <div class="col-md-6 my-2">
                <label class="form-label">Gender</label>
                <select name="gender" class="form-select">
                    <option value="">Select</option>
                    <option value="male" {{ old('gender', $student->gender ?? '') == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ old('gender', $student->gender ?? '') == 'female' ? 'selected' : '' }}>Female</option>
                    <option value="other" {{ old('gender', $student->gender ?? '') == 'other' ? 'selected' : '' }}>Other</option>
                </select>
            </div>
            <div class="col-md-6 my-2">
                <label class="form-label">Blood Group</label>

                <select name="blood_group" class="form-select" required>
                    <option value="">Select Blood</option>
                    @foreach ($bloodgroups as $bloodgroup)
                    <option value="{{ $bloodgroup->name }}"
                        {{ old('blood_group', $student->blood_group ?? '') == $bloodgroup->name ? 'selected' : '' }}>
                        {{ $bloodgroup->name }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6 my-2">
                <label class="form-label">Religion</label>
                <input type="text" name="religion" value="{{ old('religion', $student->religion ?? '') }}" class="form-control">
            </div>
            <div class="col-md-6 my-2">
                <label class="form-label">Nationality</label>
                <input type="text" name="nationality" value="{{ old('nationality', $student->nationality ?? 'Bangladeshi') }}" class="form-control">
            </div>
            <div class="col-md-6 my-2">
                <label class="form-label">Birth Certificate No.</label>
                <input type="text" name="birth_cert_no" value="{{ old('birth_cert_no', $student->birth_cert_no ?? '') }}" class="form-control">
            </div>

            {{-- Contact Info --}}
            <div class="col-md-6 my-2">
                <label class="form-label">Phone</label>
                <input type="text" name="phone" value="{{ old('phone', $student->phone ?? '') }}" class="form-control">
            </div>
            <div class="col-md-6 my-2">
                <label class="form-label">Email</label>
                <input type="email" name="email" value="{{ old('email', $student->email ?? '') }}" class="form-control">
            </div>
            <div class="col-md-6 my-2">
                <label class="form-label">Present Address</label>
                <textarea name="present_address" class="form-control">{{ old('present_address', $student->present_address ?? '') }}</textarea>
            </div>
            <div class="col-md-6 my-2">
                <label class="form-label">Permanent Address</label>
                <textarea name="permanent_address" class="form-control">{{ old('permanent_address', $student->permanent_address ?? '') }}</textarea>
            </div>

            {{-- Guardian Info --}}
            <div class="col-md-6 my-2">
                <label class="form-label">Father's Name</label>
                <input type="text" name="father_name" value="{{ old('father_name', $student->father_name ?? '') }}" class="form-control">
            </div>
            <div class="col-md-6 my-2">
                <label class="form-label">Mother's Name</label>
                <input type="text" name="mother_name" value="{{ old('mother_name', $student->mother_name ?? '') }}" class="form-control">
            </div>
            <div class="col-md-6 my-2">
                <label class="form-label">Guardian Phone</label>
                <input type="text" name="guardian_phone" value="{{ old('guardian_phone', $student->guardian_phone ?? '') }}" class="form-control">
            </div>
            <div class="col-md-6 my-2">
                <label class="form-label">Guardian Occupation</label>
                <input type="text" name="guardian_occupation" value="{{ old('guardian_occupation', $student->guardian_occupation ?? '') }}" class="form-control">
            </div>

            {{-- Academic Info --}}
            <div class="col-md-6 my-2">
                <label class="form-label">Class</label>
                <select name="class_id" class="form-select">
                    <option value="">Select Class</option>
                    @foreach ($classes as $class)
                    <option value="{{ $class->id }}" {{ old('class_id', $student->class_id ?? '') == $class->id ? 'selected' : '' }}>{{ $class->class_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6 my-2">
                <label class="form-label">Section</label>
                <select name="section_id" class="form-select">
                    <option value="">Select Section</option>
                    @foreach($sections as $section)
                    <option value="{{ $section->id }}" {{ old('section_id', $student->section_id ?? '') == $section->id ? 'selected' : '' }}>{{ $section->section_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6 my-2">
                <label class="form-label">Roll</label>
                <input type="text" name="roll" value="{{ old('roll', $student->roll ?? '') }}" class="form-control">
            </div>
            <div class="col-md-6 my-2">
                <label class="form-label">Previous School</label>
                <input type="text" name="previous_school" value="{{ old('previous_school', $student->previous_school ?? '') }}" class="form-control">
            </div>
            <div class="col-md-6 my-2">
                <label class="form-label">Last Exam Result</label>
                <input type="text" name="last_exam_result" value="{{ old('last_exam_result', $student->last_exam_result ?? '') }}" class="form-control">
            </div>

            {{-- Others --}}
            <div class="col-md-6 my-2">
                <label class="form-label">Admission Date</label>
                <input type="date" name="admission_date" value="{{ old('admission_date', $student->admission_date ?? date('Y-m-d')) }}" class="form-control">
            </div>
            <div class="col-md-6 my-2">
                <label class="form-label">Remarks</label>
                <textarea name="remarks" class="form-control">{{ old('remarks', $student->remarks ?? '') }}</textarea>
            </div>
            <div class="col-md-6 my-2">
                <label class="form-label">Photo</label>
                <input type="file" name="photo" class="form-control">
                @if(isset($student) && $student->photo)
                <img src="{{ asset($student->photo) }}" width="80" class="mt-2">
                @endif
            </div>
        </div>

        <div class="text-end mt-4">
            <button class="btn btn-primary">{{ isset($student) ? 'Update Student' : 'Add Student' }}</button>
        </div>
    </form>
</div>
@endsection