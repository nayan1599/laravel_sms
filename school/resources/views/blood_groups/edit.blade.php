@extends('layouts.layouts')

@section('content')
<div class="container">
    <h2 class="main-title">Edit Blood Group</h2>
    <form action="{{ route('blood-groups.update', $bloodGroup) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label class="form-label">Blood Group Name</label>
            <input type="text" name="name" value="{{ $bloodGroup->name }}" class="form-control" required>
        </div>
        <button class="btn btn-primary">Update</button>
        <a href="{{ route('blood-groups.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
