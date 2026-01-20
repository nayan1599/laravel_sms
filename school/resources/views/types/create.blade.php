@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Add Tag Type</div>
    <div class="card-body">
        <form action="{{ route('types.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Description</label>
                <input type="text" name="description" class="form-control">
            </div>
            <div class="mb-3">
                <label>Status</label>
                <select name="status" class="form-select">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>

            <button class="btn btn-success">Save</button>
        </form>
    </div>
</div>
@endsection
