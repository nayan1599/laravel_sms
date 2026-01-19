<style>
    .teacher-card {
    border-radius: 14px;
    transition: all 0.3s ease;
}

.teacher-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 28px rgba(0,0,0,0.12);
}

.teacher-icon {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    font-size: 28px;
    display: flex;
    align-items: center;
    justify-content: center;
}

</style>


@extends('layouts.app')
@section('title','All Teacher')
@section('content')
<div class="container">



    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="main-title">All Teachers</h2>
        <a href="{{ route('teachers.create') }}" class="btn btn-sm btn-success">+ Add New Teacher</a>
    </div>
 

    <!-- Teacher Dashboard Cards -->
    <div class="row g-4 mb-4">

        <!-- Active Teachers -->
        <div class="col-md-6">
            <a   class="text-decoration-none">
                <div class="card shadow-sm border-0 teacher-card">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <small class="text-success fw-semibold">Active Teachers</small>
                            <h2 class="fw-bold mb-0">{{ $activeTeachers }}</h2>
                        </div>
                        <div class="teacher-icon bg-success-subtle text-success">
                            <i class="bi bi-person-check-fill"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Inactive Teachers -->
        <div class="col-md-6">
            <a   class="text-decoration-none">
                <div class="card shadow-sm border-0 teacher-card">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <small class="text-danger fw-semibold">Inactive Teachers</small>
                            <h2 class="fw-bold mb-0">{{ $inactiveTeachers }}</h2>
                        </div>
                        <div class="teacher-icon bg-danger-subtle text-danger">
                            <i class="bi bi-person-x-fill"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>

    </div>
<div class="text-end">   
      <form method="GET" class="d-flex mb-3" style="max-width: 300px;">
        <input type="text" name="search" value="{{ request('search') }}" class="form-control form-control-sm me-2" placeholder="Search Teacher">
        <button class="btn btn-sm btn-primary"><i class="bi bi-search"></i></button>
    </form>
</div>
    <!-- Search Form -->




    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Employee ID</th>
                <th>Name</th>
                <th>Designation</th>
                <th>Department</th>
                <th>Join Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($teachers as $index => $teacher)
            <tr>
                <td>{{ $teachers->firstItem() + $index }}</td>
                <td>{{ $teacher->employee_id }}</td>
                <td>{{ $teacher->name }}</td>
                <td>{{ $teacher->designation }}</td>
                <td>{{ $teacher->department ?? '-' }}</td>
                <td>{{ $teacher->date_of_joining }}</td>
                <td>
                    <span class="badge 
                        @if($teacher->status == 'active') bg-success
                        @elseif($teacher->status == 'on_leave') bg-warning
                        @elseif($teacher->status == 'resigned') bg-secondary
                        @else bg-danger @endif">
                        {{ ucfirst($teacher->status) }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('teachers.show', $teacher->id) }}" class="btn btn-sm btn-info">View</a>
                    <a href="{{ route('teachers.edit', $teacher->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST" class="d-inline" 
                          onsubmit="return confirm('Are you sure you want to delete this teacher?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="8" class="text-center">No teachers found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="d-flex justify-content-center">
        {{ $teachers->links() }}
    </div>
</div>




@endsection

