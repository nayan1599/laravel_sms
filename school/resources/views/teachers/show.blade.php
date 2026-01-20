@extends('layouts.layouts')

@section('content')
<div class="container-fluid">

    {{-- ================= HEADER ================= --}}
    <div class="card mb-3 shadow-sm">
        <div class="card-body d-flex align-items-center">
            <div class="me-4">
                <img src="{{ $teacher->photo ? asset('storage/'.$teacher->photo) : asset('images/avatar.png') }}"
                     class="rounded-circle border"
                     width="90" height="90">
            </div>

            <div class="flex-grow-1">
                <h4 class="mb-0">{{ $teacher->name }}</h4>
                <small class="text-muted">{{ $teacher->designation }} • {{ $teacher->department }}</small>
                <div class="mt-2">
                    <span class="badge bg-{{ $teacher->status == 'active' ? 'success' : 'secondary' }}">
                        {{ ucfirst(str_replace('_',' ', $teacher->status)) }}
                    </span>
                </div>
            </div>

            <div>
                <a href="{{ route('teachers.edit', $teacher) }}" class="btn btn-sm btn-primary">
                    Edit Profile
                </a>
            </div>
        </div>
    </div>

    <div class="row g-3">

        {{-- ================= BASIC INFO ================= --}}
        <div class="col-md-6">
            <div class="card shadow-sm h-100">
                <div class="card-header fw-bold">Basic Information</div>
                <div class="card-body">
                    <table class="table table-sm table-borderless mb-0">
                        <tr><th>Name</th><td>{{ $teacher->name }}</td></tr>
                        <tr><th>Email</th><td>{{ $teacher->email }}</td></tr>
                        <tr><th>Phone</th><td>{{ $teacher->phone }}</td></tr>
                        <tr><th>Gender</th><td>{{ ucfirst($teacher->gender) }}</td></tr>
                        <tr><th>Date of Birth</th><td>{{ $teacher->date_of_birth }}</td></tr>
                        <tr><th>Blood Group</th><td>{{ $teacher->blood_group }}</td></tr>
                        <tr><th>Marital Status</th><td>{{ ucfirst($teacher->marital_status) }}</td></tr>
                    </table>
                </div>
            </div>
        </div>

        {{-- ================= EMPLOYEE INFO ================= --}}
        <div class="col-md-6">
            <div class="card shadow-sm h-100">
                <div class="card-header fw-bold">Employee Information</div>
                <div class="card-body">
                    <table class="table table-sm table-borderless mb-0">
                        <tr><th>Employee ID</th><td>{{ $teacher->employee_id }}</td></tr>
                        <tr><th>Designation</th><td>{{ $teacher->designation }}</td></tr>
                        <tr><th>Department</th><td>{{ $teacher->department }}</td></tr>
                        <tr><th>Joining Date</th><td>{{ $teacher->date_of_joining }}</td></tr>
                        <tr><th>Employment Type</th><td>{{ ucfirst($teacher->employment_type) }}</td></tr>
                        <tr><th>Experience</th><td>{{ $teacher->experience_years }} Years</td></tr>
                        <tr><th>Salary</th><td>{{ number_format($teacher->salary,2) }}</td></tr>
                    </table>
                </div>
            </div>
        </div>

        {{-- ================= SKILLS ================= --}}
        <div class="col-md-12">  @if(is_array($teacher->education) && count($teacher->education))
    <table class="table table-sm">
        <thead>
            <tr>
                <th>Degree</th>
                <th>Subject</th>
                <th>Institute</th>
                <th>Year</th>
            </tr>
        </thead>
        <tbody>
            @foreach($teacher->education as $edu)
                <tr>
                    <td>{{ $edu['degree'] ?? '-' }}</td>
                    <td>{{ $edu['subject'] ?? '-' }}</td>
                    <td>{{ $edu['institute'] ?? '-' }}</td>
                    <td>{{ $edu['year'] ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p class="text-muted">No education records</p>
@endif</div>
       


        {{-- ================= EDUCATION ================= --}}
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header fw-bold">Education</div>
                <div class="card-body p-0">
                    @if(!empty($teacher->education))
                    <table class="table table-sm mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Degree</th>
                                <th>Subject</th>
                                <th>Institute</th>
                                <th>Year</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($teacher->education as $edu)
                                <tr>
                                    <td>{{ $edu['degree'] ?? '-' }}</td>
                                    <td>{{ $edu['subject'] ?? '-' }}</td>
                                    <td>{{ $edu['institute'] ?? '-' }}</td>
                                    <td>{{ $edu['year'] ?? '-' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                        <div class="p-3 text-muted">No education records</div>
                    @endif
                </div>
            </div>
        </div>

        {{-- ================= ADDRESS ================= --}}
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header fw-bold">Address</div>
                <div class="card-body">
                    <strong>Present:</strong>
                    <p>{{ $teacher->present_address ?? '-' }}</p>

                    <strong>Permanent:</strong>
                    <p>{{ $teacher->permanent_address ?? '-' }}</p>
                </div>
            </div>
        </div>

        {{-- ================= EMERGENCY ================= --}}
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header fw-bold">Emergency Contact</div>
                <div class="card-body">
                    <p><strong>Name:</strong> {{ $teacher->emergency_contact_name }}</p>
                    <p><strong>Phone:</strong> {{ $teacher->emergency_contact_phone }}</p>
                </div>
            </div>
        </div>

        {{-- ================= SYSTEM ================= --}}
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header fw-bold">System Information</div>
                <div class="card-body">
                    <p><strong>Status:</strong> {{ ucfirst(str_replace('_',' ', $teacher->status)) }}</p>
                    <p><strong>Remarks:</strong> {{ $teacher->remarks ?? '-' }}</p>
                    <p class="text-muted mb-0">
                        Last Updated: {{ $teacher->updated_at->format('d M Y') }}
                    </p>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
