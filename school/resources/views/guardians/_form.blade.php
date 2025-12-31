@csrf

<div class="mb-3">
    <label>User</label>
    <select name="user_id" class="form-select" required>
        <option value="">Select User</option>
        @foreach($users as $user)
            <option value="{{ $user->id }}" {{ old('user_id', $guardian->user_id ?? '') == $user->id ? 'selected' : '' }}>{{ $user->full_name }}</option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label>Relation</label>
    <select name="relation" class="form-select" required>
        <option value="father">Father</option>
        <option value="mother">Mother</option>
        <option value="guardian">Guardian</option>
    </select>
</div>

<input type="text" name="national_id" class="form-control mb-3" placeholder="National ID" value="{{ old('national_id', $guardian->national_id ?? '') }}">
<input type="text" name="occupation" class="form-control mb-3" placeholder="Occupation" value="{{ old('occupation', $guardian->occupation ?? '') }}">
<input type="text" name="education_level" class="form-control mb-3" placeholder="Education Level" value="{{ old('education_level', $guardian->education_level ?? '') }}">
<input type="text" name="income_range" class="form-control mb-3" placeholder="Income Range" value="{{ old('income_range', $guardian->income_range ?? '') }}">
<textarea name="address" class="form-control mb-3" placeholder="Address">{{ old('address', $guardian->address ?? '') }}</textarea>

<div class="mb-3">
    <label>Status</label>
    <select name="status" class="form-select">
        <option value="active">Active</option>
        <option value="inactive">Inactive</option>
        <option value="deceased">Deceased</option>
    </select>
</div>

<div class="form-check mb-3">
    <input type="checkbox" name="emergency_contact" class="form-check-input" value="1"
        {{ old('emergency_contact', $guardian->emergency_contact ?? false) ? 'checked' : '' }}>
    <label class="form-check-label">Emergency Contact</label>
</div>
