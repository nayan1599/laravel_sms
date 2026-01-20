@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Add Tag</div>
    <div class="card-body">
        <form action="{{ route('tags.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Type</label>
<!-- types -->

                <select name="type" class="form-select">
                    @foreach($types as $type)
                        <option value="{{ $type->name }}">{{ $type->name }}</option>
                    @endforeach
                </select>
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
