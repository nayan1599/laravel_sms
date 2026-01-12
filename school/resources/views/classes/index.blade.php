

<style>
    .stat-card {
    border-radius: 12px;
    transition: all 0.3s ease;
}

.stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.12);
}

.icon-box {
    width: 55px;
    height: 55px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
}

</style>

@extends('layouts.layouts')
@section('title','All Classes')
@section('content')
<div class="container">
    <h1 class="main-title">Classes</h1>

    <div class="text-end">
        <a href="{{ route('classes.create') }}" class="btn btn-sm btn-success mb-3">Add New Class</a>
    </div>
    <div class="row g-3 py-4">

        <div class="col-md-5 col-sm-12">
            <div class="row">
                <!-- Bangla -->
                <div class="col-md-6 col-sm-6">
                    <div class="card shadow-sm border-0 h-100 stat-card bg-light">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div>
                                <small class="text-muted">Medium</small>
                                <h5 class="fw-bold mb-1">Bangla</h5>
                                <h2 class="fw-bold text-primary mb-0">{{ $bangla }}</h2>
                            </div>
                            <div class="icon-box bg-primary text-white">
                                <i class="fa-solid fa-arrow-up-from-water-pump"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- English -->
                <div class="col-md-6 col-sm-6">
                    <div class="card shadow-sm border-0 h-100 stat-card bg-light">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div>
                                <small class="text-muted">Medium</small>
                                <h5 class="fw-bold mb-1">English</h5>
                                <h2 class="fw-bold text-success mb-0">{{ $english }}</h2>
                            </div>
                            <div class="icon-box bg-success text-white">
                                <i class="fa-solid fa-arrow-up-from-water-pump"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-7 col-sm-12">
            <div class="row">
                <!-- Math -->
                <div class="col-md-4 col-sm-4">
                    <div class="card shadow-sm border-0 h-100 stat-card bg-light">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div>
                                <small class="text-muted">Shift</small>
                                <h5 class="fw-bold mb-1">Morning</h5>
                                <h2 class="fw-bold text-warning mb-0">{{ $morning }}</h2>
                            </div>
                            <div class="icon-box bg-warning text-white">
                                <i class="fa-solid fa-shield"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Science -->
                <div class="col-md-4 col-sm-4">
                    <div class="card shadow-sm border-0 h-100 stat-card bg-light">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div>
                                <small class="text-muted">Shift</small>
                                <h5 class="fw-bold mb-1">Day</h5>
                                <h2 class="fw-bold text-danger mb-0">{{ $day }}</h2>
                            </div>
                            <div class="icon-box bg-danger text-white">
                                <i class="fa-solid fa-shield"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Science -->
                <div class="col-md-4 col-sm-4">
                    <div class="card shadow-sm border-0 h-100 stat-card bg-light">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div>
                                <small class="text-muted">Shift</small>
                                <h5 class="fw-bold mb-1">Evening</h5>
                                <h2 class="fw-bold text-danger mb-0">{{ $evening }}</h2>
                            </div>
                            <div class="icon-box bg-danger text-white">
                                <i class="fa-solid fa-shield"></i>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>




    </div>







    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Class Name</th>
                <th>Numeric</th>
                <th>Code</th>
                <th>Medium</th>
                <th>Shift</th>
                <th>Teacher</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($classes as $class)
            <tr>
                <td>{{ $class->id }}</td>
                <td>{{ $class->class_name }}</td>
                <td>{{ $class->class_numeric }}</td>
                <td>{{ $class->class_code }}</td>
                <td>{{ ucfirst($class->medium) }}</td>
                <td>{{ ucfirst($class->shift) }}</td>
                <td>{{ $class->teacher ? $class->teacher->name : 'N/A' }}</td>
                <td>{{ ucfirst($class->status) }}</td>
                <td>
                    <a href="{{ route('classes.show', $class->id) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('classes.edit', $class->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('classes.destroy', $class->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm"
                            onclick="return confirm('Are you sure to delete this class?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $classes->links() }}
</div>
@endsection