@extends('layouts.layouts')

@section('content')
<div class="container">
    <h2>Edit Room</h2>

    <form action="{{ route('rooms.update', $room->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Room Name</label>
            <input type="text" name="room_name" 
                   value="{{ $room->room_name }}" 
                   class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Room Number</label>
            <input type="text" name="room_number" 
                   value="{{ $room->room_number }}" 
                   class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Capacity</label>
            <input type="number" name="capacity" 
                   value="{{ $room->capacity }}" 
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Floor</label>
            <input type="text" name="floor" 
                   value="{{ $room->floor }}" 
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Building</label>
            <input type="text" name="building" 
                   value="{{ $room->building }}" 
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="is_active" class="form-control">
                <option value="1" {{ $room->is_active ? 'selected' : '' }}>Active</option>
                <option value="0" {{ !$room->is_active ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
