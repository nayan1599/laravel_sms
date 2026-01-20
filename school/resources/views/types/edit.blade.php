@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Edit Tag Type</div>
    <div class="card-body">
        <form action="{{ route('types.update', $tagType) }}" method="POST">
            @csrf @method('PUT')

            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" value="{{ $tagType->name }}" class="form-control">
            </div>
            
       
            <div class="mb-3">
                <label>Description</label>
                <input type="text" name="description" value="{{ $tagType->description }}" class="form-control">
            </div>

            <div class="mb-3">
                <label>Status</label>
                <select name="status" class="form-select">
                    <option value="1" {{ $tagType->status ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ !$tagType->status ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            <button class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
