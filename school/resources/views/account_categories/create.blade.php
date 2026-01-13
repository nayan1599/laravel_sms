<div class="mb-3">
    <label>Category Name</label>
    <input type="text" name="name"
        value="{{ old('name', $account_category->name ?? '') }}"
        class="form-control" required>
</div>

<div class="mb-3">
    <label>Type</label>
    <select name="type" class="form-control" required>
        <option value="income"
            @selected(($account_category->type ?? '')=='income')>
            Income
        </option>
        <option value="expense"
            @selected(($account_category->type ?? '')=='expense')>
            Expense
        </option>
    </select>
</div>

<div class="mb-3">
    <label>Description</label>
    <textarea name="description"
        class="form-control">{{ old('description', $account_category->description ?? '') }}</textarea>
</div>

<div class="mb-3">
    <label>Status</label>
    <select name="status" class="form-control">
        <option value="1">Active</option>
        <option value="0">Inactive</option>
    </select>
</div>
