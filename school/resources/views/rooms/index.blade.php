@extends('layouts.layouts')

@section('content')
<div class="container">
    <h2>Room List</h2>

    <a href="{{ route('rooms.create') }}" class="btn btn-primary mb-3">
        Add Room
    </a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Name</th>
                <th>Number</th>
                <th>Capacity</th>
                <th>Floor</th>
                <th>Building</th>
                <th>Status</th>
                <th width="150">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rooms as $room)
            <tr>
                <td>{{ $room->room_name }}</td>
                <td>{{ $room->room_number }}</td>
                <td>{{ $room->capacity }}</td>
                <td>{{ $room->floor ?? '-' }}</td>
                <td>{{ $room->building ?? '-' }}</td>
                <td>
                    @if($room->is_active)
                        <span class="badge bg-success">Active</span>
                    @else
                        <span class="badge bg-danger">Inactive</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('rooms.edit', $room->id) }}" 
                       class="btn btn-sm btn-warning">Edit</a>

                    <form action="{{ route('rooms.destroy', $room->id) }}" 
                          method="POST" 
                          style="display:inline-block">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger"
                            onclick="return confirm('Delete this room?')">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
