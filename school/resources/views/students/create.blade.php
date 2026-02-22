@extends('layouts.layouts')

@section('content')
<div class="container">
    <h2 class="main-title">{{ isset($student) ? 'Edit Student' : 'Add New Student' }}</h2>

    {{-- Display validation errors --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ isset($student) ? route('students.update', $student->id) : route('students.store') }}" 
          method="POST" 
          enctype="multipart/form-data"
          id="studentForm">
        @csrf
        @if(isset($student)) @method('PUT') @endif

        <div class="row">
            {{-- Personal Info --}}
            <div class="col-md-6 my-2">
                <label class="form-label">Full Name <span class="text-danger">*</span></label>
                <input type="text" 
                       name="name" 
                       value="{{ old('name', $student->name ?? '') }}" 
                       class="form-control @error('name') is-invalid @enderror" 
                       required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 my-2">
                <label class="form-label">Date of Birth</label>
                <input type="date" 
                       name="date_of_birth" 
                       value="{{ old('date_of_birth', $student->date_of_birth ?? '') }}" 
                       class="form-control @error('date_of_birth') is-invalid @enderror">
                @error('date_of_birth')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 my-2">
                <label class="form-label">Gender</label>
                <select name="gender" class="form-select @error('gender') is-invalid @enderror">
                    <option value="">Select Gender</option>
                    <option value="male" {{ old('gender', $student->gender ?? '') == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ old('gender', $student->gender ?? '') == 'female' ? 'selected' : '' }}>Female</option>
                    <option value="other" {{ old('gender', $student->gender ?? '') == 'other' ? 'selected' : '' }}>Other</option>
                </select>
                @error('gender')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 my-2">
                <label class="form-label">Blood Group</label>
                <select name="blood_group" class="form-select @error('blood_group') is-invalid @enderror">
                    <option value="">Select Blood Group</option>
                    @foreach ($bloodgroups as $bloodgroup)
                    <option value="{{ $bloodgroup->name }}"
                        {{ old('blood_group', $student->blood_group ?? '') == $bloodgroup->name ? 'selected' : '' }}>
                        {{ $bloodgroup->name }}
                    </option>
                    @endforeach
                </select>
                @error('blood_group')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 my-2">
                <label class="form-label">Religion</label>
                <input type="text" 
                       name="religion" 
                       value="{{ old('religion', $student->religion ?? '') }}" 
                       class="form-control @error('religion') is-invalid @enderror">
                @error('religion')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 my-2">
                <label class="form-label">Nationality</label>
                <input type="text" 
                       name="nationality" 
                       value="{{ old('nationality', $student->nationality ?? 'Bangladeshi') }}" 
                       class="form-control @error('nationality') is-invalid @enderror">
                @error('nationality')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 my-2">
                <label class="form-label">Birth Certificate No.</label>
                <input type="text" 
                       name="birth_cert_no" 
                       value="{{ old('birth_cert_no', $student->birth_cert_no ?? '') }}" 
                       class="form-control @error('birth_cert_no') is-invalid @enderror">
                @error('birth_cert_no')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Contact Info --}}
            <div class="col-md-6 my-2">
                <label class="form-label">Phone</label>
                <input type="text" 
                       name="contact" 
                       value="{{ old('contact', $student->contact ?? '') }}" 
                       class="form-control @error('contact') is-invalid @enderror">
                @error('contact')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 my-2">
                <label class="form-label">Email</label>
                <input type="email" 
                       name="email" 
                       value="{{ old('email', $student->email ?? '') }}" 
                       class="form-control @error('email') is-invalid @enderror">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 my-2">
                <label class="form-label">Present Address</label>
                <textarea name="present_address" 
                          class="form-control @error('present_address') is-invalid @enderror">{{ old('present_address', $student->present_address ?? '') }}</textarea>
                @error('present_address')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 my-2">
                <label class="form-label">Permanent Address</label>
                <textarea name="permanent_address" 
                          class="form-control @error('permanent_address') is-invalid @enderror">{{ old('permanent_address', $student->permanent_address ?? '') }}</textarea>
                @error('permanent_address')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Guardian Info --}}
            <div class="col-md-6 my-2">
                <label class="form-label">Father's Name</label>
                <input type="text" 
                       name="father_name" 
                       value="{{ old('father_name', $student->father_name ?? '') }}" 
                       class="form-control @error('father_name') is-invalid @enderror">
                @error('father_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 my-2">
                <label class="form-label">Mother's Name</label>
                <input type="text" 
                       name="mother_name" 
                       value="{{ old('mother_name', $student->mother_name ?? '') }}" 
                       class="form-control @error('mother_name') is-invalid @enderror">
                @error('mother_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- FIXED: Changed name from guardian_contact to guardian_phone to match controller --}}
            <div class="col-md-6 my-2">
                <label class="form-label">Guardian Phone</label>
                <input type="text" 
                       name="guardian_phone" 
                       value="{{ old('guardian_phone', $student->guardian_phone ?? '') }}" 
                       class="form-control @error('guardian_phone') is-invalid @enderror">
                @error('guardian_phone')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 my-2">
                <label class="form-label">Guardian Occupation</label>
                <input type="text" 
                       name="guardian_occupation" 
                       value="{{ old('guardian_occupation', $student->guardian_occupation ?? '') }}" 
                       class="form-control @error('guardian_occupation') is-invalid @enderror">
                @error('guardian_occupation')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Residential Type --}}
            <div class="col-md-6 my-2">
                <label class="form-label">Residential Type</label>
                <select name="residential_type" class="form-select @error('residential_type') is-invalid @enderror">
                    <option value="">Select Residential Type</option>
                    <option value="day_scholar" {{ old('residential_type', $student->residential_type ?? '') == 'day_scholar' ? 'selected' : '' }}>Day Scholar</option>
                    <option value="hostel" {{ old('residential_type', $student->residential_type ?? '') == 'hostel' ? 'selected' : '' }}>Hostel</option>
                </select>
                @error('residential_type')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Academic Info --}}
            <div class="col-md-6 my-2">
                <label class="form-label">Class <span class="text-danger">*</span></label>
                <select name="class_id" 
                        id="class_id" 
                        class="form-select @error('class_id') is-invalid @enderror" 
                        required>
                    <option value="">Select Class</option>
                    @foreach ($classes as $class)
                    <option value="{{ $class->id }}" 
                        {{ old('class_id', $student->class_id ?? '') == $class->id ? 'selected' : '' }}>
                        {{ $class->class_name }}
                    </option>
                    @endforeach
                </select>
                @error('class_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 my-2">
                <label class="form-label">Section</label>
                <select name="section_id" 
                        id="section_id" 
                        class="form-select @error('section_id') is-invalid @enderror">
                    <option value="">Select Section</option>
                    @foreach($sections as $section)
                    <option value="{{ $section->id }}" 
                        {{ old('section_id', $student->section_id ?? '') == $section->id ? 'selected' : '' }}>
                        {{ $section->section_name }}
                    </option>
                    @endforeach
                </select>
                @error('section_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 my-2">
                <label class="form-label">Roll</label>
                <input type="number" 
                       name="roll" 
                       id="roll"
                       value="{{ old('roll', $student->roll ?? '') }}" 
                       class="form-control @error('roll') is-invalid @enderror">
                <small class="text-muted">Roll number must be unique within the same class and section</small>
                @error('roll')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <div id="roll-error" class="text-danger small" style="display: none;"></div>
            </div>

            <div class="col-md-6 my-2">
                <label class="form-label">Previous School</label>
                <input type="text" 
                       name="previous_school" 
                       value="{{ old('previous_school', $student->previous_school ?? '') }}" 
                       class="form-control @error('previous_school') is-invalid @enderror">
                @error('previous_school')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 my-2">
                <label class="form-label">Last Exam Result</label>
                <input type="text" 
                       name="last_exam_result" 
                       value="{{ old('last_exam_result', $student->last_exam_result ?? '') }}" 
                       class="form-control @error('last_exam_result') is-invalid @enderror">
                @error('last_exam_result')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Others --}}
            <div class="col-md-6 my-2">
                <label class="form-label">Admission Date</label>
                <input type="date" 
                       name="admission_date" 
                       value="{{ old('admission_date', $student->admission_date ?? date('Y-m-d')) }}" 
                       class="form-control @error('admission_date') is-invalid @enderror">
                @error('admission_date')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 my-2">
                <label class="form-label">Remarks</label>
                <textarea name="remarks" 
                          class="form-control @error('remarks') is-invalid @enderror">{{ old('remarks', $student->remarks ?? '') }}</textarea>
                @error('remarks')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 my-2">
                <label class="form-label">Photo</label>
                <input type="file" 
                       name="photo" 
                       id="photo"
                       accept="image/jpeg,image/png,image/jpg,image/gif,image/svg"
                       class="form-control @error('photo') is-invalid @enderror">
                <small class="text-muted">Max size: 2MB. Allowed: jpeg, png, jpg, gif, svg</small>
                @error('photo')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                @if(isset($student) && $student->photo)
                <div class="mt-2">
                    <img src="{{ asset($student->photo) }}" width="80" class="img-thumbnail">
                </div>
                @endif
            </div>
        </div>

        <div class="text-end mt-4">
            <a href="{{ route('students.index') }}" class="btn btn-secondary me-2">Cancel</a>
            <button type="submit" class="btn btn-primary" id="submitBtn">
                {{ isset($student) ? 'Update Student' : 'Add Student' }}
            </button>
        </div>
    </form>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const classSelect = document.getElementById('class_id');
    const sectionSelect = document.getElementById('section_id');
    const rollInput = document.getElementById('roll');
    const rollError = document.getElementById('roll-error');
    const studentId = '{{ $student->id ?? '' }}';

    // Function to check roll uniqueness
    function checkRollUniqueness() {
        const classId = classSelect.value;
        const sectionId = sectionSelect.value;
        const roll = rollInput.value;

        if (classId && sectionId && roll) {
            fetch(`/students/check-roll?class_id=${classId}&section_id=${sectionId}&roll=${roll}&student_id=${studentId}`)
                .then(response => response.json())
                .then(data => {
                    if (!data.unique) {
                        rollError.textContent = 'Roll number already exists in this class and section.';
                        rollError.style.display = 'block';
                        rollInput.classList.add('is-invalid');
                    } else {
                        rollError.style.display = 'none';
                        rollInput.classList.remove('is-invalid');
                    }
                });
        }
    }

    // Add event listeners for roll uniqueness check
    if (classSelect && sectionSelect && rollInput) {
        classSelect.addEventListener('change', checkRollUniqueness);
        sectionSelect.addEventListener('change', checkRollUniqueness);
        rollInput.addEventListener('blur', checkRollUniqueness);
    }

    // Photo preview
    const photoInput = document.getElementById('photo');
    if (photoInput) {
        photoInput.addEventListener('change', function(e) {
            if (this.files && this.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    // You can add a preview element here if needed
                    console.log('Photo selected');
                }
                reader.readAsDataURL(this.files[0]);
            }
        });
    }

    // Form submission validation
    const form = document.getElementById('studentForm');
    if (form) {
        form.addEventListener('submit', function(e) {
            if (rollError && rollError.style.display === 'block') {
                e.preventDefault();
                alert('Please fix the roll number error before submitting.');
            }
        });
    }

    // Dynamic section loading based on class (if needed)
    @if(isset($classes) && $classes->count() > 0)
    // You can add AJAX to load sections based on selected class
    // This would require an API endpoint
    @endif
});
</script>
@endpush

@push('styles')
<style>
    .form-label {
        font-weight: 500;
        margin-bottom: 0.3rem;
    }
    .text-danger {
        color: #dc3545;
    }
    .img-thumbnail {
        border-radius: 4px;
        padding: 3px;
    }
</style>
@endpush
@endsection