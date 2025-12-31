@extends('layouts.layouts')

@section('content')
<div class="container">
    <h2 class="main-title">All Banners</h2>
    <a href="{{ route('banners.create') }}" class="btn btn-success mb-3">+ Add Banner</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Subtitle</th>
                <th>Image</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($banners as $banner)
            <tr>
                <td>{{ $banner->title }}</td>
                <td>{{ $banner->subtitle }}</td>
                <td>
                    @if($banner->image)
                        <img src="{{ asset('storage/' . $banner->image) }}" style="height:40px;">
                    @endif
                </td>
                <td>{{ $banner->status ? 'Active' : 'Inactive' }}</td>
                <td>
                    <a href="{{ route('banners.edit', $banner) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('banners.destroy', $banner) }}" method="POST" style="display:inline-block;">
                        @csrf @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $banners->links() }}
</div>
@endsection
