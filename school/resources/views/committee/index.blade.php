@extends('layouts.layouts')

@section('content')
<div class="container">
    <h2 class="mb-4">School Committee Members</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('committees.create') }}" class="btn btn-success mb-3">Add New Member</a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Photo</th>
                <th>Name</th>
                <th>Designation</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($committees as $index => $committee)
                <tr>
                    <td>{{ $index + $committees->firstItem() }}</td>
                    <td>
                        @if($committee->profile_photo)
                            <img src="{{ asset('storage/' . $committee->profile_photo) }}" alt="Photo" width="50" height="50" style="object-fit: cover; border-radius: 50%;">
                        @else
                            <span>No Photo</span>
                        @endif
                    </td>
                    <td>{{ $committee->name }}</td>
                    <td>{{ $committee->designation }}</td>
                    <td>{{ $committee->email }}</td>
                    <td>{{ $committee->phone }}</td>
                    <td>
                        @if($committee->status == 'active')
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-secondary">Inactive</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('committees.edit', $committee->id) }}" class="btn btn-sm btn-warning">Edit</a>

                        <form action="{{ route('committees.destroy', $committee->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">No committee members found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $committees->links() }}
</div>
@endsection
