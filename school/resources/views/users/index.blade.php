@extends('layouts.layouts')

@section('content')
<div class="container-fluid py-4">

    {{-- Page Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="main-title">User Management</h3>
            <p>Manage system users and roles</p>
        </div>
        <a href="{{ route('users.create') }}" class="btn btn-primary shadow-sm">
            <i class="bi bi-plus-circle me-1"></i> Add User
        </a>
    </div>

    {{-- Success Alert --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
            <i class="bi bi-check-circle me-1"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- Card --}}
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-light border-0">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h6 class="mb-0 fw-semibold">
                        <i class="bi bi-people me-1"></i> User List
                    </h6>
                </div>
                <div class="col-md-6 text-end">
                    <form method="GET" class="d-flex justify-content-end">
                        <input type="text"
                               name="search"
                               value="{{ request('search') }}"
                               class="form-control   w-50 me-2"
                               placeholder="Search name or email">
                        <button class="btn btn-sm btn-outline-primary">
                             search
                        </button>
                    </form>
                </div>
            </div>
        </div>

        {{-- Table --}}
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th width="5%">#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th width="12%">Role</th>
                            <th width="18%" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $key => $user)
                        <tr>
                            <td>{{ $users->firstItem() + $key }}</td>

                            <td>
                                <div class="fw-semibold">{{ $user->name }}</div>
                            </td>

                            <td class="text-muted">{{ $user->email }}</td>

                            <td>
                                <span class="badge rounded-pill
                                    {{ $user->role == 'admin' ? 'bg-danger' : 'bg-primary' }}">
                                    {{ ucfirst($user->role) }}
                                </span>
                            </td>

                            <td class="text-center">
                                <a href="{{ route('users.edit',$user->id) }}"
                                   class="btn btn-sm btn-outline-warning me-1">
                                    Edit
                                </a>

                                <form action="{{ route('users.destroy',$user->id) }}"
                                      method="POST"
                                      class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Are you sure?')"
                                            class="btn btn-sm btn-outline-danger">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">
                                <i class="bi bi-info-circle"></i> No users found
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Pagination --}}
        @if($users->hasPages())
        <div class="card-footer bg-white border-0">
            <div class="d-flex justify-content-end">
                {{ $users->withQueryString()->links() }}
            </div>
        </div>
        @endif
    </div>

</div>
@endsection
