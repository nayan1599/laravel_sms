@extends('layouts.app')

@section('title','Teacher Dashboard')

@push('styles')
<style>
    .dashboard-card {
        border-radius: 16px;
        transition: all .3s ease;
    }

    .dashboard-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 14px 30px rgba(0, 0, 0, .12);
    }

    .icon-box {
        width: 56px;
        height: 56px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
    }

    .welcome-box {
        background: linear-gradient(135deg, #4f46e5, #3b82f6);
        color: #fff;
        border-radius: 18px;
    }
</style>
@endpush

@section('content')
<div class="container-fluid py-4">

    <!-- Welcome Section -->
    <div class="welcome-box p-4 mb-4 ">
        <h4 class="fw-bold mb-1 main-title">Welcome back, {{ auth()->user()->name }} 👋</h4>
        <small class="opacity-75">Teacher Dashboard Overview</small>
    </div>

    <!-- Statistics Cards -->
    <div class="row g-4">

        <div class="col-xl-3 col-md-6">
            <div class="card dashboard-card border-0">
                <a href="{{ url('teacher/studentlist') }}">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <small class="text-muted">Total Students</small>
                            <h3 class="fw-bold mb-0">{{ $totalStudents }}</h3>
                        </div>
                        <div class="icon-box bg-primary-subtle text-primary">
                            <i class="bi bi-people-fill"></i>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card dashboard-card border-0">
                <a href="{{ url('leave/index') }}">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <small class="text-muted">Pending Leaves</small>
                            <h3 class="fw-bold mb-0">{{ $pendingLeaves }}</h3>
                        </div>
                        <div class="icon-box bg-warning-subtle text-warning">
                            <i class="bi bi-clock-history"></i>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card dashboard-card border-0">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <small class="text-muted">Total Notices</small>
                        <h3 class="fw-bold mb-0">{{ $totalNotices }}</h3>
                    </div>
                    <div class="icon-box bg-info-subtle text-info">
                        <i class="bi bi-megaphone-fill"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card dashboard-card border-0">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <small class="text-muted">Your Subjects</small>
                        <h3 class="fw-bold mb-0">{{ $totalSubjects }}</h3>
                    </div>
                    <div class="icon-box bg-success-subtle text-success">
                        <i class="bi bi-book-fill"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card dashboard-card border-0">
                <a href="{{ url('teacher/classes') }}">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <small class="text-muted">Total Classes</small>
                            <h3 class="fw-bold mb-0">{{ $totalClasses }}</h3>
                        </div>
                        <div class="icon-box bg-danger-subtle text-danger">
                            <i class="bi bi-easel-fill"></i>
                        </div>
                    </div>
                </a>
            </div>
        </div>

    </div>

</div>
@endsection