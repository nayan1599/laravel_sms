@csrf
<div class="mb-3">
    <label>Name</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $employee->name ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Email</label>
    <input type="email" name="email" class="form-control" value="{{ old('email', $employee->email ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Phone</label>
    <input type="text" name="phone" class="form-control" value="{{ old('phone', $employee->phone ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Designation</label>
    <input type="text" name="designation" class="form-control" value="{{ old('designation', $employee->designation ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Joining Date</label>
    <input type="date" name="joining_date" class="form-control" value="{{ old('joining_date', $employee->joining_date ?? '') }}">
</div>

<button class="btn btn-success">Save</button>
<a href="{{ route('employees.index') }}" class="btn btn-secondary">Back</a>