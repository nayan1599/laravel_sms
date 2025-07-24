@extends('layouts.layouts')

@section('content')
<div class="container py-4">
    <h2 class="mb-4 text-primary fw-bold border-bottom pb-2">Categories</h2>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{ route('categories.create') }}" class="btn btn-success">
            <i class="bi bi-plus-lg"></i> Add Category
        </a>
        @if(session('success'))
            <div class="alert alert-success mb-0 py-2 px-3" style="min-width: 250px;">
                {{ session('success') }}
            </div>
        @endif
    </div>

    <div class="table-responsive shadow-sm rounded">
        <table class="table table-striped table-hover align-middle mb-0 bg-white">
            <thead class="table-primary">
                <tr>
                    <th scope="col" class="text-uppercase text-secondary">Name</th>
                    <th scope="col" class="text-uppercase text-secondary">Slug</th>
                    <th scope="col" class="text-uppercase text-secondary">Status</th>
                    <th scope="col" class="text-uppercase text-secondary text-center" style="width: 150px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td><code>{{ $category->slug }}</code></td>
                    <td>
                        @if($category->status)
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-secondary">Inactive</span>
                        @endif
                    </td>
                    <td class="text-center">
                        <a href="{{ route('categories.edit', $category) }}" class="btn btn-sm btn-primary me-1" title="Edit">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <form action="{{ route('categories.destroy', $category) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure to delete this category?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" title="Delete" type="submit">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center text-muted fst-italic py-4">No categories found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-3 d-flex justify-content-center">
        {{ $categories->links() }}
    </div>
</div>
@endsection
