<!-- resources/views/teachers/partials/form.blade.php -->
<div class="row g-3">
    <div class="col-md-6">
        <label for="user_id" class="form-label">User (Name)</label>
        <input type="number" name="user_id" value="{{ old('user_id', $teacher->user_id ?? '') }}" class="form-control @error('user_id') is-invalid @enderror">
        @error('user_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label for="employee_id" class="form-label">Employee ID</label>
        <input type="text" name="employee_id" value="{{ old('employee_id', $teacher->employee_id ?? '') }}" class="form-control @error('employee_id') is-invalid @enderror">
        @error('employee_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
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

    <div class="col-md-6">
        <label for="blood_group" class="form-label">Blood Group</label>
        <input type="text" name="blood_group" value="{{ old('blood_group', $teacher->blood_group ?? '') }}" class="form-control">
    </div>

    <div class="col-md-6">
        <label for="emergency_contact_name" class="form-label">Emergency Contact Name</label>
        <input type="text" name="emergency_contact_name" value="{{ old('emergency_contact_name', $teacher->emergency_contact_name ?? '') }}" class="form-control">
    </div>

    <div class="col-md-6">
        <label for="emergency_contact_phone" class="form-label">Emergency Contact Phone</label>
        <input type="text" name="emergency_contact_phone" value="{{ old('emergency_contact_phone', $teacher->emergency_contact_phone ?? '') }}" class="form-control">
    </div>
</div>
