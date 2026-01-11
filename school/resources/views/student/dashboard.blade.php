@extends('layouts.app')

@section('title', 'Student Dashboard')

@section('content')
<div class="container-fluid py-4">

    {{-- Top Welcome --}}
    <div class="text-center mb-4">
        <h4 class="fw-semibold mb-1">
            Welcome back, <span class="text-primary">{{ auth()->user()->name }}</span>
        </h4>
        <p class="text-muted mb-0">Here is your academic overview</p>
        <hr class="w-25 mx-auto">
    </div>

    {{-- Header Row --}}
    <div class="row align-items-center mb-4">
        <div class="col-md-8">
            <h3 class="fw-bold main-title mb-0">🎓 Student Dashboard</h3>
        </div>
        <div class="col-md-4 text-md-end mt-3 mt-md-0">
            <span class="badge bg-primary fs-6 px-3 py-2">
                Class: {{ $classModel->class_name ?? 'N/A' }}
            </span>
        </div>
    </div>

    {{-- Info + Quick Actions --}}
    <div class="row g-4 mb-4">

        {{-- Student Info --}}
        <div class="col-lg-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-header bg-white fw-bold">
                    👤 Student Information
                </div>
                <div class="card-body">
                    <p class="mb-2"><strong>Name:</strong> {{ $student->name ?? '-' }}</p>
                    <p class="mb-2"><strong>Email:</strong> {{ $student->email ?? '-' }}</p>
                    <p class="mb-2"><strong>Roll:</strong> {{ $student->roll ?? '-' }}</p>
                    <p class="mb-0"><strong>Class:</strong> {{ $classModel->class_name ?? '-' }}</p>
                </div>
            </div>
        </div>

        {{-- Quick Cards --}}
        <div class="col-lg-8">
            <div class="row g-3">

                <div class="col-md-4">
                    <div class="card shadow-sm border-0 text-center h-100 hover-card">
                        <div class="card-body">
                            <div class="fs-2 mb-2">📅</div>
                            <h6 class="fw-bold">Attendance</h6>
                            <p class="text-muted small">Check attendance records</p>
                            <a href="#" class="btn btn-outline-primary btn-sm">
                                View
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card shadow-sm border-0 text-center h-100 hover-card">
                        <div class="card-body">
                            <div class="fs-2 mb-2">💰</div>
                            <h6 class="fw-bold">Fees</h6>
                            <p class="text-muted small">Paid & due fees</p>
                            <a href="{{ route('student.fee') }}" class="btn btn-outline-success btn-sm">
                                View
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card shadow-sm border-0 text-center h-100 hover-card">
                        <div class="card-body">
                            <div class="fs-2 mb-2">📊</div>
                            <h6 class="fw-bold">Results</h6>
                            <p class="text-muted small">Exam & marksheet</p>
                            <a href="{{ route('student.results') }}" class="btn btn-outline-warning btn-sm">
                                View
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>



    <!-- fees  -->
    <section class="bg-light rounded p-4 mb-5">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="fw-bold mb-0">📢 Latest Fees</h5>
            <a href="{{ route('student.fee') }}" class="btn btn-sm btn-outline-primary">
                See All
            </a>
        </div>
        <div class="card-body p-0">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Fee Type</th>
                        <th>Amount</th>
                        <th>Expiry Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
             
            </table>

    </section>
 
    {{-- Notices Section --}}
    <section class="bg-light rounded p-4 shadow-sm">
        @php
        use App\Models\Notice;
        use Illuminate\Support\Str;
        $notices = Notice::orderby('created_at', 'desc')->latest()->take(1)->get();
        @endphp

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="fw-bold mb-0">📢 Latest Notices</h5>
            <a href="{{ route('notices.index') }}" class="btn btn-sm btn-outline-primary">
                See All
            </a>
        </div>

        @if($notices->count())
        <div class="row g-4">
            @foreach($notices as $notice)
            <div class="col-md-12">
                <div class="card border-0 h-100">
                    <div class="row g-0 h-100">

                        {{-- Image --}}
                        <div class="col-4">
                            <img
                                src="{{ $notice->image && file_exists(public_path($notice->image)) ? asset($notice->image) : asset('images/no-image.png') }}"
                                class="img-fluid rounded-start h-100"
                                style="object-fit: cover"
                                alt="Notice Image">
                        </div>

                        {{-- Content --}}
                        <div class="col-8">
                            <div class="card-body">
                                <h6 class="fw-bold mb-1">{{ $notice->title }}</h6>
                                <small class="text-muted">
                                    <i class="bi bi-calendar-event"></i>
                                    {{ $notice->created_at->format('d M, Y') }}
                                </small>

                                <p class="mt-2 mb-2 small">
                                    {{ Str::limit(strip_tags($notice->description), 200) }}
                                </p>

                                <a href="{{ route('notices.show', $notice->id) }}" class="btn btn-primary btn-sm">
                                    Read More
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <p class="text-center text-muted mb-0">No notices available.</p>
        @endif
    </section>

</div>
@endsection