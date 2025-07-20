@extends('layouts.layouts')

@section('content')
<div class="container mt-4">
    <h2 class="main-title">Menu List</h2>
    <a href="{{ route('menus.create') }}" class="btn btn-success mb-3">Add New Menu</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>URL</th>
                <th>Route Name</th>
                <th>Parent</th>
                <th>Order</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($menus as $menu)
            <tr>
                <td>{{ $menu->title }}</td>
                <td>{{ $menu->url ?? '-' }}</td>
                <td>{{ $menu->route_name ?? '-' }}</td>
                <td>{{ $menu->parent ? $menu->parent->title : '-' }}</td>
                <td>{{ $menu->order }}</td>
                <td>{{ ucfirst($menu->status) }}</td>
                <td>
                    <a href="{{ route('menus.edit', $menu->id) }}" class="btn btn-sm btn-warning">Edit</a>

                    <form action="{{ route('menus.destroy', $menu->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure to delete?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $menus->links() }}
</div>
@endsection
