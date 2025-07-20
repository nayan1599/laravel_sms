@extends('layouts.layouts')

@section('content')
<div class="container">
    <h2 class="main-title">📋 All Notices</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('notices.create') }}" class="btn btn-success mb-3">+ New Notice</a>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Title</th>
                    <th>Notice Date</th>
                    <th>Expires</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($notices as $notice)
                <tr>
                    <td>{{ $notice->title }}</td>
                    <td>{{ $notice->notice_date }}</td>
                    <td>{{ $notice->expiry_date ?? '-' }}</td>
                    <td><span class="badge bg-{{ $notice->status == 'active' ? 'success' : 'secondary' }}">{{ ucfirst($notice->status) }}</span></td>
                    <td>
                         <a href="{{ route('notices.show', $notice) }}" class="btn btn-sm btn-info">View</a>
                        <a href="{{ route('notices.edit', $notice) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('notices.destroy', $notice) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?');">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger">Del</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="5">No notices found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
