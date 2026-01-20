<!-- resources/views/teachers/partials/form.blade.php -->
<div class="row g-3">
    {{-- ================= BASIC INFORMATION ================= --}}
    <div class="col-12">
        <h5 class="border-bottom pb-2">Basic Information</h5>
    </div>

    <div class="col-md-6">
        <label class="form-label">Name *</label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
            value="{{ old('name') }}">
        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Email *</label>
        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
            value="{{ old('email') }}">
        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Phone</label>
        <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
    </div>

    <div class="col-md-6">
        <label class="form-label">Alternate Phone</label>
        <input type="text" name="alternate_phone" class="form-control" value="{{ old('alternate_phone') }}">
    </div>
    {{-- ================= EMPLOYEE INFORMATION ================= --}}
    <div class="col-12 mt-4">
        <h5 class="border-bottom pb-2">Employee Information</h5>
    </div>

    <div class="col-md-4">
        <label class="form-label">Employee ID *</label>
        <input type="text" name="employee_id" class="form-control @error('employee_id') is-invalid @enderror"
            value="{{ old('employee_id') }}">
        @error('employee_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-4">
        <label class="form-label">Designation *</label>
        <input type="text" name="designation" class="form-control"
            value="{{ old('designation') }}">
    </div>

    <div class="col-md-4">
        <label class="form-label">Department</label>
        <select name="department" class="form-select">
            <option value="">Select Department</option>
            @foreach($departments as $dept)
            <option value="{{ $dept->name }}" {{ old('department') == $dept->name ? 'selected' : '' }}>
                {{ $dept->name }}
            </option>
            @endforeach
        </select>
    </div>
    {{-- ================= PERSONAL INFORMATION ================= --}}
    <div class="col-12 mt-4">
        <h5 class="border-bottom pb-2">Personal Information</h5>
    </div>

    <div class="col-md-3">
        <label class="form-label">Gender</label>
        <select name="gender" class="form-select">
            <option value="">Select</option>
            @foreach(['male','female','other'] as $g)
            <option value="{{ $g }}" {{ old('gender') == $g ? 'selected' : '' }}>
                {{ ucfirst($g) }}
            </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-3">
        <label class="form-label">Date of Birth</label>
        <input type="date" name="date_of_birth" class="form-control"
            value="{{ old('date_of_birth') }}">
    </div>

    <div class="col-md-3">
        <label class="form-label">Blood Group</label>
        <input type="text" name="blood_group" class="form-control"
            value="{{ old('blood_group') }}">
    </div>

    <div class="col-md-3">
        <label class="form-label">National ID</label>
        <input type="text" name="national_id" class="form-control"
            value="{{ old('national_id') }}">
    </div>


    <div class="col-md-3">
        <label class="form-label">Marital Status</label>
        <select name="marital_status" class="form-select">
            <option value="">Select</option>
            @foreach(['single','married','divorced','widowed'] as $m)
            <option value="{{ $m }}" {{ old('marital_status') == $m ? 'selected' : '' }}>
                {{ ucfirst($m) }}
            </option>
            @endforeach
        </select>
    </div>
    {{-- ================= QUALIFICATION & SKILLS ================= --}}
    <div class="col-12 mt-4">
        <h5 class="border-bottom pb-2">QUALIFICATION & SKILLS</h5>
    </div>
    <div class="col-12">

        @php
        $skills = old('skills', $teacher->skills ?? [[]]);
        @endphp

        <div id="skills-wrapper">
            @foreach ($skills as $index => $skill)
            <div class="row g-2 mb-2 skills-row">
                <div class="col-md-3">
                    <input type="text" name="skills[{{ $index }}][company]"
                        value="{{ $skill['company'] ?? '' }}"
                        class="form-control" placeholder="Company">
                </div>
                <div class="col-md-3">
                    <input type="text" name="skills[{{ $index }}][role]"
                        value="{{ $skill['role'] ?? '' }}"
                        class="form-control" placeholder="Role">
                </div>
                <div class="col-md-3">
                    <input type="text" name="skills[{{ $index }}][duration]"
                        value="{{ $skill['duration'] ?? '' }}"
                        class="form-control" placeholder="Duration">
                </div>
                <div class="col-md-1">
                    <button type="button" class="btn btn-danger remove-skills">×</button>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-end">
            <button type="button" class="btn btn-sm btn-primary mt-2" id="add-skills">
                + Add Skills
            </button>
        </div>

    </div>

    {{-- ================= EDUCATION ================= --}}
    <div class="col-12 mt-4">
        <h5 class="border-bottom pb-2">EDUCATION</h5>
    </div>
    <div class="col-12">

        <label class="form-label">Education</label>
        @php
        $educations = old('education', $teacher->education ?? [[]]);
        @endphp

        <div id="education-wrapper">
            @foreach ($educations as $index => $edu)
            <div class="row g-2 mb-2 education-row">
                <div class="col-md-3">
                    <input type="text" name="education[{{ $index }}][degree]"
                        value="{{ $edu['degree'] ?? '' }}"
                        class="form-control" placeholder="Degree">
                </div>
                <div class="col-md-3">
                    <input type="text" name="education[{{ $index }}][subject]"
                        value="{{ $edu['subject'] ?? '' }}"
                        class="form-control" placeholder="Subject">
                </div>
                <div class="col-md-3">
                    <input type="text" name="education[{{ $index }}][institute]"
                        value="{{ $edu['institute'] ?? '' }}"
                        class="form-control" placeholder="Institute">
                </div>
                <div class="col-md-2">
                    <input type="text" name="education[{{ $index }}][year]"
                        value="{{ $edu['year'] ?? '' }}"
                        class="form-control" placeholder="Year">
                </div>
                <div class="col-md-1">
                    <button type="button" class="btn btn-danger remove-education">×</button>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-end">
            <button type="button" class="btn btn-sm btn-primary mt-2" id="add-education">
                + Add Education
            </button>
        </div>

    </div>
    {{-- ================= JOB INFO ================= --}}
    <div class="col-12 mt-4">
        <h5 class="border-bottom pb-2">Job Information</h5>
    </div>

    <div class="col-md-3">
        <label class="form-label">Joining Date *</label>
        <input type="date" name="date_of_joining" class="form-control @error('date_of_joining') is-invalid @enderror"
            value="{{ old('date_of_joining') }}">
        @error('date_of_joining') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-3">
        <label class="form-label">Leaving Date</label>
        <input type="date" name="date_of_leaving" class="form-control"
            value="{{ old('date_of_leaving') }}">
    </div>

    <div class="col-md-3">
        <label class="form-label">Employment Type *</label>
        <select name="employment_type" class="form-select">
            @foreach(['permanent','contract','part-time'] as $t)
            <option value="{{ $t }}">{{ ucfirst($t) }}</option>
            @endforeach
        </select>
    </div>
    <!-- salary -->
    <div class="col-md-3">
        <label class="form-label">Salary</label>
        <input type="number" name="salary" class="form-control"
            value="{{ old('salary') }}">
    </div>

    <!-- last_increment_date -->
    <div class="col-md-3">
        <label class="form-label">Last Increment Date</label>
        <input type="date" name="last_increment_date" class="form-control"
            value="{{ old('last_increment_date') }}">
    </div>

    <div class="col-md-3">
        <label class="form-label">Status *</label>
        <select name="status" class="form-select">
            @foreach(['active','on_leave','resigned','retired'] as $s)
            <option value="{{ $s }}">{{ ucfirst($s) }}</option>
            @endforeach
        </select>
    </div>
    {{-- ================= ADDRESS INFORMATION ================= --}}
    <div class="col-12 mt-4">
        <h5 class="border-bottom pb-2">Address Information</h5>
    </div>

    <div class="col-md-6">
        <label class="form-label">Present Address</label>
        <textarea name="present_address"
            class="form-control"
            rows="3"
            placeholder="Current address">
        {{ old('present_address', $teacher->present_address ?? '') }}
        </textarea>
    </div>

    <div class="col-md-6">
        <label class="form-label">Permanent Address</label>
        <textarea name="permanent_address"
            class="form-control"
            rows="3"
            placeholder="Permanent address">
        {{ old('permanent_address', $teacher->permanent_address ?? '') }}
        </textarea>
    </div>
    {{-- ================= EMERGENCY ================= --}}
    <div class="col-12 mt-4">
        <h5 class="border-bottom pb-2">Emergency Contact</h5>
    </div>

    <div class="col-md-6">
        <label class="form-label">Contact Name</label>
        <input type="text" name="emergency_contact_name" class="form-control">
    </div>

    <div class="col-md-6">
        <label class="form-label">Contact Phone</label>
        <input type="text" name="emergency_contact_phone" class="form-control">
    </div>
    {{-- ================= SYSTEM INFORMATION ================= --}}
    <div class="col-12 mt-4">
        <h5 class="border-bottom pb-2">System Information</h5>
    </div>

    <div class="col-md-3">
        <label class="form-label">Status <span class="text-danger">*</span></label>
        <select name="status"
            class="form-select @error('status') is-invalid @enderror">
            @foreach(['active','on_leave','resigned','retired'] as $status)
            <option value="{{ $status }}"
                {{ old('status', $teacher->status ?? 'active') == $status ? 'selected' : '' }}>
                {{ ucfirst(str_replace('_',' ', $status)) }}
            </option>
            @endforeach
        </select>
        @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-9">
        <label class="form-label">Remarks / Notes</label>
        <textarea name="remarks"
            class="form-control"
            rows="2"
            placeholder="Any internal notes (optional)">
        {{ old('remarks', $teacher->remarks ?? '') }}
        </textarea>
    </div>
</div>

<script>
    document.getElementById('add-skills').addEventListener('click', function() {
        const wrapper = document.getElementById('skills-wrapper');
        const index = wrapper.children.length;
        const row = document.createElement('div');
        row.classList.add('row', 'g-2', 'mb-2', 'skills-row');
        row.innerHTML = `
            <div class="col-md-3">
                <input type="text" name="skills[${index}][company]" class="form-control" placeholder="Degree">
            </div>
            <div class="col-md-3">
                <input type="text" name="skills[${index}][role]" class="form-control" placeholder="Subject">
            </div>
            <div class="col-md-3">
                <input type="text" name="skills[${index}][duration]" class="form-control" placeholder="Institute">
            </div>
            
            <div class="col-md-1">
                <button type="button" class="btn btn-danger remove-skills">×</button>
            </div>
        `;
        wrapper.appendChild(row);
    });

    document.getElementById('skills-wrapper').addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-skills')) {
            e.target.closest('.skills-row').remove();
        }
    });





    document.getElementById('add-education').addEventListener('click', function() {
        const wrapper = document.getElementById('education-wrapper');
        const index = wrapper.children.length;
        const row = document.createElement('div');
        row.classList.add('row', 'g-2', 'mb-2', 'education-row');
        row.innerHTML = `
            <div class="col-md-3">
                <input type="text" name="education[${index}][degree]" class="form-control" placeholder="Degree">
            </div>
            <div class="col-md-3">
                <input type="text" name="education[${index}][subject]" class="form-control" placeholder="Subject">
            </div>
            <div class="col-md-3">
                <input type="text" name="education[${index}][institute]" class="form-control" placeholder="Institute">
            </div>
            <div class="col-md-2">
                <input type="text" name="education[${index}][year]" class="form-control" placeholder="Year">
            </div>
            <div class="col-md-1">
                <button type="button" class="btn btn-danger remove-education">×</button>
            </div>
        `;
        wrapper.appendChild(row);
    });

    document.getElementById('education-wrapper').addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-education')) {
            e.target.closest('.education-row').remove();
        }
    });
</script>