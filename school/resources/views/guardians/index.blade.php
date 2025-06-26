@extends('layouts.layouts')

@section('content')
<div class="container">
    <h2>Guardian List</h2>
    <a href="{{ route('guardians.create') }}" class="btn btn-primary mb-2">+ Add Guardian</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>User</th>
                <th>Relation</th>
                <th>Occupation</th>
                <th>Emergency</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($guardians as $i => $guardian)
                <tr>
                    <td>{{ $guardians->firstItem() + $i }}</td>
                    <td>{{ $guardian->user->full_name ?? 'N/A' }}</td>
                    <td>{{ ucfirst($guardian->relation) }}</td>
                    <td>{{ $guardian->occupation }}</td>
                    <td>{{ $guardian->emergency_contact ? 'Yes' : 'No' }}</td>
                    <td>{{ ucfirst($guardian->status) }}</td>
                    <td>
                        <a href="{{ route('guardians.show', $guardian->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('guardians.edit', $guardian->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('guardians.destroy', $guardian->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm">Del</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $guardians->links() }}
</div>
@endsection
