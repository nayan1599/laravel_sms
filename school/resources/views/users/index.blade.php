@extends('layouts.layouts')
@section('title', 'User Management')

@section('content')
<div class="container-fluid py-4">

    {{-- Page Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-0 main-title">👥 User Management</h3>
            <small class="text-muted">Manage system users & roles</small>
        </div>
        <a href="{{ route('users.create') }}" class="btn btn-primary shadow-sm">
            <i class="bi bi-plus-circle me-1"></i> Add User
        </a>
    </div>

    {{-- Success Alert --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm">
            <i class="bi bi-check-circle me-1"></i> {{ session('success') }}
            <button class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- Card --}}
    <div class="card border-0 shadow-sm">

        {{-- Card Header --}}
        <div class="card-header bg-light border-0">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h6 class="fw-semibold mb-0">
                        <i class="bi bi-people me-1"></i> User List
                    </h6>
                </div>
                <div class="col-md-6">
                    <form method="GET" class="d-flex justify-content-end">
                        <input type="text"
                               name="search"
                               value="{{ request('search') }}"
                               class="form-control form-control-sm w-50 me-2"
                               placeholder="Search name or email">
                        <button class="btn btn-sm btn-outline-primary">
                           Search
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
                            <th>User</th>
                            <th width="15%">Role</th>
                            <th width="20%" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $key => $user)
                        <tr>
                            <td>{{ $users->firstItem() + $key }}</td>

                            {{-- User Info --}}
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <img src="{{ asset($user->photo) }}"
                                         class="rounded-circle"
                                         width="40" height="40">
                                    <div>
                                        <div class="fw-semibold">{{ $user->name }}</div>
                                        <small class="text-muted">{{ $user->email }}</small>
                                    </div>
                                </div>
                            </td>

                            {{-- Role --}}
                            <td>
                                <span class="badge rounded-pill
                                    {{ $user->role == 'admin' ? 'bg-danger' :
                                       ($user->role == 'teacher' ? 'bg-success' : 'bg-primary') }}">
                                    {{ ucfirst($user->role) }}
                                </span>
                            </td>

                            {{-- Actions --}}
                            <td class="text-center">
                                <a href="{{ route('users.show',$user->id) }}"
                                   class="btn btn-sm btn-outline-info me-1"
                                   title="View">
                                    View
                                </a>

                                <a href="{{ route('users.edit',$user->id) }}"
                                   class="btn btn-sm btn-outline-warning me-1"
                                   title="Edit">
                                     Edit
                                </a>

                                <form action="{{ route('users.destroy',$user->id) }}"
                                      method="POST"
                                      class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Are you sure?')"
                                            class="btn btn-sm btn-outline-danger"
                                            title="Delete">
                                       delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted py-4">
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
