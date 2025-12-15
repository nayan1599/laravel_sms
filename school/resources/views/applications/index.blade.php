@extends('layouts.layouts')
@section('title','Student Applications')
@section('content')
<div class="container-fluid py-4">
    <h3 class="fw-bold mb-3">Student Applications</h3>
    <div class="card shadow-sm border-0">
        <div class="card-body table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Gender</th>
                        <th>Status</th>
                        <th class="text-end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($applications as $app)
                    <tr>
                        <td>{{ $app->name }}</td>
                        <td>{{ $app->phone }}</td>
                        <td><span class="badge bg-secondary">{{ ucfirst($app->gender) }}</span></td>
                        <td>
                            <span class="badge bg-warning text-dark">{{ ucfirst($app->status) }}</span>
                        </td>
                        <td class="text-end">
                            <a href="{{ route('applications.show',$app->id) }}" class="btn btn-sm btn-outline-info">
                                <i class="bi bi-eye"></i>
                            </a>
                            <form method="POST" action="{{ route('applications.approve',$app->id) }}" class="d-inline">
                                @csrf
                                <button class="btn btn-sm btn-outline-success">
                                    <i class="bi bi-check"></i>
                                </button>
                            </form>
                            <form method="POST" action="{{ route('applications.reject',$app->id) }}" class="d-inline">
                                @csrf
                                <button class="btn btn-sm btn-outline-danger">
                                    <i class="bi bi-x"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $applications->links() }}
        </div>
    </div>
</div>
@endsection