@extends('layouts.layouts')

@section('content')
<div class="container">
    <h2>Add New Blood Group</h2>

    <form action="{{ route('blood-groups.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Blood Group Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <button class="btn btn-success">Save</button>
        <a href="{{ route('blood-groups.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
