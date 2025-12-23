@csrf
<div class="  rounded p-4">

    <div class="row">
        <!-- Name -->
        <div class="col-md-6 mb-3">
            <label class="form-label">Name <span class="text-danger">*</span></label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $employee->name ?? '') }}" required>
        </div>

        <!-- Email -->
        <div class="col-md-6 mb-3">
            <label class="form-label">Email <span class="text-danger">*</span></label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $employee->email ?? '') }}" required>
        </div>

        <!-- Phone -->
        <div class="col-md-6 mb-3">
            <label class="form-label">Phone <span class="text-danger">*</span></label>
            <input type="text" name="phone" class="form-control" value="{{ old('phone', $employee->phone ?? '') }}" required>
        </div>

        <!-- Designation -->
        <div class="col-md-6 mb-3">
            <label class="form-label">Designation <span class="text-danger">*</span></label>
            <input type="text" name="designation" class="form-control" value="{{ old('designation', $employee->designation ?? '') }}" required>
        </div>

        <!-- Department -->
        <div class="col-md-6 mb-3">
            <label class="form-label">Department <span class="text-danger">*</span></label>
            <select name="department" class="form-select" required>
                <option value="">-- Select Department --</option>
                @foreach($departments as $department)
                <option value="{{ $department->name }}" {{ old('department', $employee->department ?? '') == $department->name ? 'selected' : '' }}>
                    {{ $department->name }}
                </option>
                @endforeach
            </select>
        </div>

        <!-- status  -->
        <div class="col-md-6 mb-3">
            <label class="form-label">Status <span class="text-danger">*</span></label>
            <select name="status" class="form-select" required>
                <option value="active" {{ old('status', $employee->status ?? '') == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ old('status', $employee->status ?? '') == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>
        <!-- Joining Date -->
        <div class="col-md-6 mb-3">
            <label class="form-label">Joining Date</label>
            <input type="date" name="joining_date" class="form-control" value="{{ old('joining_date', $employee->joining_date ?? '') }}">
        </div>
    </div>

    <div class="mt-4">
        <button type="submit" class="btn btn-success">
            <i class="bi bi-save"></i> Save
        </button>
        <a href="{{ route('employees.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Back
        </a>
    </div>
</div>