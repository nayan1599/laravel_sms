@extends('layouts.layouts')

@section('content')
<div class="container py-4">
    <h2 class="mb-4 text-primary fw-bold border-bottom pb-2">Posts List</h2>

    <a href="{{ route('posts.create') }}" class="btn btn-success mb-3">
        <i class="bi bi-plus-lg"></i> Add New Post
    </a>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="table-responsive shadow-sm rounded">
        <table class="table table-hover align-middle mb-0 bg-white">
            <thead class="table-primary">
                <tr>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Published At</th>
                    <th>Feature Image</th>
                    <th class="text-center" style="width: 130px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($posts as $post)
                <tr>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->category->name ?? 'N/A' }}</td>
                    <td>
                        @if($post->status)
                        <span class="badge bg-success">Published</span>
                        @else
                        <span class="badge bg-secondary">Draft</span>
                        @endif
                    </td>
                    <td>{{ $post->published_at?->format('Y-m-d') ?? '-' }}</td>
                    <td>
                        @if($post->feature_image)
                        <img src="{{ asset($post->feature_image) }}" alt="Feature Image"
                            style="max-width: 80px; max-height: 50px; border-radius: 4px;">
                        @else
                        <span class="text-muted fst-italic">No image</span>
                        @endif
                    </td>
                    <td class="text-center">
                        <a href="{{ route('posts.edit', $post) }}" class="btn btn-sm btn-primary me-1" title="Edit">
                            <i class="bi bi-pencil-square"></i>
                        </a>

                        <form action="{{ route('posts.destroy', $post) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Are you sure to delete this post?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" title="Delete">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center text-muted fst-italic py-4">
                        No posts found.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-3 d-flex justify-content-center">
        {{ $posts->links() }}
    </div>
</div>
@endsection
