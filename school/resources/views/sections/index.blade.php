<style>
    .section-card {
    border-radius: 14px;
    transition: all 0.3s ease;
    background: #fff;
}

.section-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 12px 30px rgba(0, 0, 0, 0.12);
}

.section-icon {
    width: 55px;
    height: 55px;
    border-radius: 50%;
    font-size: 26px;
    display: flex;
    align-items: center;
    justify-content: center;
}

</style>



@extends('layouts.layouts')
@section('title', 'Section List')
@section('content')
<div class="container">

    <h2 class="main-title">Sections List</h2>
    <a href="{{ route('sections.create') }}" class="btn btn-success mb-2">Add New Section</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif



<div class="row g-4 py-3">
    @foreach($sectioncount as $section)
        <div class="col-md-3 col-sm-6">
            <div class="card section-card shadow-sm border-0 h-100">
                <div class="card-body d-flex align-items-center justify-content-between">

                    <!-- Left Content -->
                    <div>
                        <small class="text-muted">Section</small>
                        <h5 class="fw-bold mb-1">
                            {{ $section->section_name }}
                        </h5>
                        <h2 class="fw-bold text-primary mb-0">
                            {{ $section->total_students }}
                        </h2>
                        <small class="text-muted">Students</small>
                    </div>

                    <!-- Icon -->
                    <div class="section-icon bg-primary-subtle text-primary">
                        <i class="bi bi-diagram-3-fill"></i>
                    </div>

                </div>
            </div>
        </div>
    @endforeach
</div>


  <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Class</th>
                <th>Section</th>
                <th>Capacity</th>
                <th>Teacher</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($sections as $section)
            <tr>
                <td>{{ $section->class->class_name ?? 'N/A' }}</td>
                <td>{{ $section->section_name }}</td>
                <td>{{ $section->section_capacity }}</td>
                <td>{{ $section->teacher->name ?? 'N/A' }}</td>
                <td>{{ ucfirst($section->status) }}</td>
                <td>
                    <a href="{{ route('sections.edit', $section->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('sections.destroy', $section->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $sections->links() }}
</div>
@endsection
