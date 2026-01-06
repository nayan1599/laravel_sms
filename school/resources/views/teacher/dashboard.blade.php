@extends('layouts.app')

@section('title','Teacher Dashboard')

@section('content')
<div class="container-fluid py-4">

    <div class="text-center mb-4">
        <h4 class="fw-bold">Welcome, {{ auth()->user()->name }}</h4>
        <small class="text-muted">Teacher Dashboard</small>
    </div>

    <div class="row g-4">

        <div class="col-md-3">
            <div class="card shadow-sm border-0 p-3 text-center">
                <h6>Total Students</h6>
                <span class="fs-4 fw-bold">{{ $totalStudents }}</span>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm border-0 p-3 text-center">
                <h6>Pending Leaves</h6>
                <span class="fs-4 fw-bold">{{ $pendingLeaves }}</span>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm border-0 p-3 text-center">
                <h6>Total Notices</h6>
                <span class="fs-4 fw-bold">{{ $totalNotices }}</span>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm border-0 p-3 text-center">
                <h6>Your Subjects</h6>
                <span class="fs-4 fw-bold">{{ $totalSubjects }}</span>
            </div>
        </div>

    </div>

    <div class="row g-4 mt-3">
        <div class="col-md-3">
            <div class="card shadow-sm border-0 p-3 text-center">
                <h6>Total Classes</h6>
                <span class="fs-4 fw-bold">{{ $totalClasses }}</span>
            </div>
        </div>
    </div>

</div>
@endsection
