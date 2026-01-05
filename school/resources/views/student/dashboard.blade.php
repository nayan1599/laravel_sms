@extends('layouts.app')
@section('title', 'My Dashboard')
@section('content')
<div class="container">


{{$student}}

    <div class="row mb-4">
        <div class="col">
            <h3 class="fw-bold main-title">🎓 Student Dashboard</h3>
            <p class="text-muted">
                Welcome, {{ auth()->user()->name }}
            </p>
        </div>
    </div>

    <div class="row g-4">
 
 
        <!-- Fees -->
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6 class="fw-bold">💰 My Fees</h6>
                    <p class="text-muted">View paid & due fees</p>
                    <a href="#" class="btn btn-sm btn-primary">View Fees</a>
                </div>
            </div>
        </div>

        <!-- Results -->
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6 class="fw-bold">📊 My Results</h6>
                    <p class="text-muted">Check exam results</p>
                    <a href="#" class="btn btn-sm btn-success">View Results</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
