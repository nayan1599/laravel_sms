@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Edit Tag</div>
    <div class="card-body">
        <form action="{{ route('tags.update', $tag) }}" method="POST">
            @csrf @method('PUT')

            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" value="{{ $tag->name }}" class="form-control">
            </div>

            <div class="mb-3">
                <label>Type</label>
                <select name="type" class="form-select">
                    <option value="skill" {{ $tag->type=='skill'?'selected':'' }}>Skill</option>
                    <option value="subject" {{ $tag->type=='subject'?'selected':'' }}>Subject</option>
                </select>
            </div>

            <div class="mb-3">
                <label>Status</label>
                <select name="status" class="form-select">
                    <option value="1" {{ $tag->status?'selected':'' }}>Active</option>
                    <option value="0" {{ !$tag->status?'selected':'' }}>Inactive</option>
                </select>
            </div>

            <button class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
