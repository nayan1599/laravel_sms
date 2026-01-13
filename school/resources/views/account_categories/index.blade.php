@extends('layouts.app')
@section('title','Account Categories')

@section('content')
<div class="container-fluid py-4">

<a href="{{ route('account-categories.create') }}" class="btn btn-primary mb-3">
    + Add Category
</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Type</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($categories as $cat)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $cat->name }}</td>
            <td>
                <span class="badge {{ $cat->type=='income'?'bg-success':'bg-danger' }}">
                    {{ ucfirst($cat->type) }}
                </span>
            </td>
            <td>
                {{ $cat->status ? 'Active' : 'Inactive' }}
            </td>
            <td>
                <a href="{{ route('account-categories.edit',$cat->id) }}"
                   class="btn btn-sm btn-warning">Edit</a>

                <form action="{{ route('account-categories.destroy',$cat->id) }}"
                      method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger"
                        onclick="return confirm('Delete?')">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</div>
@endsection
