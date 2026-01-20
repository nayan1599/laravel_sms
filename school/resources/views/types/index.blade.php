@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h5>Tag Types</h5>
        <a href="{{ route('types.create') }}" class="btn btn-primary btn-sm">Add Type</a>
    </div>

    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th width="150">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($types as $type)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ ucfirst($type->name) }}</td>
                    <td>
                        <span class="badge {{ $type->status ? 'bg-success' : 'bg-danger' }}">
                            {{ $type->status ? 'Active' : 'Inactive' }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('types.edit', $type) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('types.destroy', $type) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm"
                                onclick="return confirm('Delete this type?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{ $types->links() }}
    </div>
</div>
@endsection
