@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
<div class="container-fluid">

    {{-- Page Title --}}
    <div class="mb-4">
        <h3 class="fw-bold main-title">Dashboard</h3>
        <p class="text-muted mb-0">School Management Overview</p>
    </div>

    {{-- Summary Cards --}}
    <div class="row g-3 mb-4">
        <div class="col-xl-3 col-md-6">
            <div class="card shadow-sm border-0">
                <div class="card-body d-flex align-items-center">
                    <div class="icon-box bg-primary text-white me-3">
                        <i class="fa-solid fa-user-graduate"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-0">Total Students</h6>
                        <h4 class="fw-bold mb-0">{{ $totalStudents ?? 0 }}</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card shadow-sm border-0">
                <div class="card-body d-flex align-items-center">
                    <div class="icon-box bg-success text-white me-3">
                        <i class="fa-solid fa-person-chalkboard"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-0">Total Teachers</h6>
                        <h4 class="fw-bold mb-0">{{ $totalTeachers ?? 0 }}</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card shadow-sm border-0">
                <div class="card-body d-flex align-items-center">
                    <div class="icon-box bg-warning text-white me-3">
                        <i class="fa-solid fa-school"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-0">Total Classes</h6>
                        <h4 class="fw-bold mb-0">{{ $totalClasses ?? 0 }}</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card shadow-sm border-0">
                <div class="card-body d-flex align-items-center">
                    <div class="icon-box bg-danger text-white me-3">
                        <i class="fa-solid fa-money-bill-wave"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-0">Pending Fees</h6>
                        <h4 class="fw-bold mb-0">{{ $pendingFees ?? 0 }} ৳</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- Charts --}}
    <div class="row mb-4">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white fw-bold">
                    Student Admission (Last 6 Months)
                </div>
                <div class="card-body">
                    <canvas id="studentChart" height="120"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white fw-bold">
                    Attendance Overview
                </div>
                <div class="card-body">
                    <canvas id="attendanceChart"></canvas>
                </div>
            </div>
        </div>
    </div>
    {{-- Recent Tables --}}
    <div class="row">
        <div class="col-lg-6">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white fw-bold">
                    Recent Students
                </div>
                <div class="card-body p-0">
                    <table class="table mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Name</th>
                                <th>Class</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentStudents ?? [] as $student)
                            <tr>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->class->name ?? '-' }}</td>
                                <td>{{ $student->created_at->format('d M Y') }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="text-center text-muted">No data found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white fw-bold">
                    Pending Leave Requests
                </div>
                <div class="card-body p-0">
                    <table class="table mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>User</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Day</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($pendingLeaves ?? [] as $leave)
                            <tr>
                                <td>{{ $leave->student->name }}</td>
                                <td>{{ ucfirst($leave->leave_type) }}</td>
                                <td>
                                    @if($leave->status === 'approved')
                                    <span class="badge bg-success">Approved</span>
                                    @elseif($leave->status === 'pending')
                                    <span class="badge bg-warning">Pending</span>
                                    @else
                                    <span class="badge bg-danger">Rejected</span>
                                    @endif
                                </td>                                
                                <th>{{$leave->total_days}}</th>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="text-center text-muted">No pending leave</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection



<script>
    document.addEventListener("DOMContentLoaded", function() {

        // Student Line Chart
        new Chart(document.getElementById('studentChart'), {
            type: 'line',
            data: {
                labels: @json($months),
                datasets: [{
                    label: 'Students',
                    data: @json($studentCounts),
                    fill: true,
                    tension: 0.4,
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });

        // Attendance Doughnut Chart
        new Chart(document.getElementById('attendanceChart'), {
            type: 'doughnut',
            data: {
                labels: ['Present', 'Absent'],
                datasets: [{
                    data: @json($attendanceData),
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                cutout: '70%',
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });

    });
</script>