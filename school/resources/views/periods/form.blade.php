<div class="mb-3">
    <label class="form-label">Period No</label>
    <input type="number" name="period_number"
        class="form-control @error('period_number') is-invalid @enderror"
        value="{{ old('period_number', $period->period_number ?? '') }}"
        required>
    @error('period_number') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label class="form-label">Period Name</label>
    <input type="text" name="name"
        class="form-control"
        value="{{ old('name', $period->name ?? '') }}">
</div>

<div class="mb-3">
    <label class="form-label">Start Time</label>
    <input type="time" name="start_time"
        class="form-control @error('start_time') is-invalid @enderror"
        value="{{ old('start_time', $period->start_time ?? '') }}"
        required>
    @error('start_time') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label class="form-label">End Time</label>
    <input type="time" name="end_time"
        class="form-control @error('end_time') is-invalid @enderror"
        value="{{ old('end_time', $period->end_time ?? '') }}"
        required>
    @error('end_time') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label class="form-label">Sort Order</label>
    <input type="number" name="sort_order"
        class="form-control"
        value="{{ old('sort_order', $period->sort_order ?? 99) }}">
</div>

<div class="form-check mb-3">
    <input type="checkbox" name="is_break" value="1"
        class="form-check-input"
        {{ old('is_break', $period->is_break ?? false) ? 'checked' : '' }}>
    <label class="form-check-label">
        Is Break Period
    </label>
</div>