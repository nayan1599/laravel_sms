<!-- resources/views/teachers/partials/form.blade.php -->
<div class="row g-3">
 
    <div class="col-md-6">
        <label for="emergency_contact_name" class="form-label">Nick Name</label>
        <input type="text" name="emergency_contact_name" value="{{ old('emergency_contact_name', $teacher->emergency_contact_name ?? '') }}" class="form-control">
    </div>
    <div class="col-md-6">
        <label class="form-label">Name</label>
        <input type="text" name="name" value="{{ old('name', $teacher->name ?? '') }}" class="form-control @error('name') is-invalid @enderror">
        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-6">
        <label for="emergency_contact_phone" class="form-label">Contact Phone</label>
        <input type="text" name="emergency_contact_phone" value="{{ old('emergency_contact_phone', $teacher->emergency_contact_phone ?? '') }}" class="form-control">
    </div>
    <div class="col-md-6">
        <label for="email" class="form-label">Email</label>
        <input type="text" name="email" value="{{ old('email', $teacher->email ?? '') }}" class="form-control">
    </div>
    <div class="col-md-6">
        <label for="employee_id" class="form-label">Employee ID</label>
        <input type="text" name="employee_id" value="{{ old('employee_id', $teacher->employee_id ?? '') }}" class="form-control @error('employee_id') is-invalid @enderror">
        @error('employee_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
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

        <button type="button" class="btn btn-sm btn-primary mt-2" id="add-education">
            + Add Education
        </button>
    </div>
    <div class="col-12">

        <label class="form-label">Skills</label>
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

        <button type="button" class="btn btn-sm btn-primary mt-2" id="add-skills">
            + Add Skills
        </button>
    </div>


    <div class="col-md-6">
        <label for="designation" class="form-label">Designation</label>
        <input type="text" name="designation" value="{{ old('designation', $teacher->designation ?? '') }}" class="form-control @error('designation') is-invalid @enderror">
        @error('designation') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label for="department" class="form-label">Department</label>
        <input type="text" name="department" value="{{ old('department', $teacher->department ?? '') }}" class="form-control">
    </div>

    <div class="col-md-6">
        <label for="qualification" class="form-label">Qualification</label>
        <input type="text" name="qualification" value="{{ old('qualification', $teacher->qualification ?? '') }}" class="form-control">
    </div>

    <div class="col-md-3">
        <label for="experience_years" class="form-label">Experience (Years)</label>
        <input type="number" name="experience_years" value="{{ old('experience_years', $teacher->experience_years ?? 0) }}" class="form-control">
    </div>

    <div class="col-md-3">
        <label for="salary" class="form-label">Salary</label>
        <input type="number" step="0.01" name="salary" value="{{ old('salary', $teacher->salary ?? 0) }}" class="form-control">
    </div>

    <div class="col-md-6">
        <label for="date_of_joining" class="form-label">Joining Date</label>
        <input type="date" name="date_of_joining" value="{{ old('date_of_joining', $teacher->date_of_joining ?? '') }}" class="form-control @error('date_of_joining') is-invalid @enderror">
        @error('date_of_joining') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label for="date_of_leaving" class="form-label">Leaving Date</label>
        <input type="date" name="date_of_leaving" value="{{ old('date_of_leaving', $teacher->date_of_leaving ?? '') }}" class="form-control">
    </div>

    <div class="col-md-6">
        <label for="subject_specialization" class="form-label">Subject Specialization</label>
        <input type="text" name="subject_specialization" value="{{ old('subject_specialization', $teacher->subject_specialization ?? '') }}" class="form-control">
    </div>

    <div class="col-md-3">
        <label for="employment_type" class="form-label">Employment Type</label>
        <select name="employment_type" class="form-select">
            @foreach(['permanent', 'contract', 'part-time'] as $type)
            <option value="{{ $type }}" {{ old('employment_type', $teacher->employment_type ?? '') == $type ? 'selected' : '' }}>
                {{ ucfirst($type) }}
            </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-3">
        <label for="status" class="form-label">Status</label>
        <select name="status" class="form-select">
            @foreach(['active', 'on_leave', 'resigned', 'retired'] as $status)
            <option value="{{ $status }}" {{ old('status', $teacher->status ?? '') == $status ? 'selected' : '' }}>
                {{ ucfirst($status) }}
            </option>
            @endforeach
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