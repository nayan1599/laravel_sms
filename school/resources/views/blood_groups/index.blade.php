@extends('layouts.layouts')

@section('content')
<div class="container">
    <h2 class="main-title">All Blood Groups</h2>
    <a href="{{ route('blood-groups.create') }}" class="btn btn-success mb-3">+ Add Blood Group</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <th>#</th>
            <th>Name</th>
            <th>Actions</th>
        </thead>
        @foreach($bloodGroups as $key => $group)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $group->name }}</td>
            <td>
                <a href="{{ route('blood-groups.edit', $group) }}" class="btn btn-primary btn-sm">Edit</a>
                <form action="{{ route('blood-groups.destroy', $group) }}" method="POST" style="display:inline-block">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
