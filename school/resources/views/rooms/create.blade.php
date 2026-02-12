@extends('layouts.layouts')

@section('content')
<div class="container">
    <h2>Create Room</h2>

    <form action="{{ route('rooms.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Room Name</label>
            <input type="text" name="room_name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Room Number</label>
            <input type="text" name="room_number" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Capacity</label>
            <input type="number" name="capacity" class="form-control">
        </div>

        <div class="mb-3">
            <label>Floor</label>
            <input type="text" name="floor" class="form-control">
        </div>

        <div class="mb-3">
            <label>Building</label>
            <input type="text" name="building" class="form-control">
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="is_active" class="form-control">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
        </div>

        <button class="btn btn-success">Save</button>
    </form>
</div>
@endsection
