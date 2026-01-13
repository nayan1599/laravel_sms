@extends('layouts.layouts')

@section('title','Application Details')

@section('content')
<div class="container py-4">

    <div class="card shadow border-0">
        <div class="card-header bg-dark text-white">
            <h5 class="mb-0">🎓 Admission Application Details</h5>
        </div>

        <div class="card-body">
            <table class="table table-bordered align-middle">

                <tr>
                    <th width="25%">Student Name</th>
                    <td>{{ $application->name }}</td>
                </tr>

                <tr>
                    <th>Phone</th>
                    <td>{{ $application->phone }}</td>
                </tr>

                <tr>
                    <th>Email</th>
                    <td>{{ $application->email ?? 'N/A' }}</td>
                </tr>

                <tr>
                    <th>Gender</th>
                    <td>{{ ucfirst($application->gender) }}</td>
                </tr>

                <tr>
                    <th>Date of Birth</th>
                    <td>{{ $application->dob }}</td>
                </tr>

                <tr>
                    <th>Applied Class</th>
                    <td>{{ $application->class->name ?? 'N/A' }}</td>
                </tr>

                <tr>
                    <th>Father Name</th>
                    <td>{{ $application->father_name }}</td>
                </tr>

                <tr>
                    <th>Mother Name</th>
                    <td>{{ $application->mother_name }}</td>
                </tr>

                <tr>
                    <th>Address</th>
                    <td>{{ $application->address }}</td>
                </tr>

                <tr>
                    <th>Status</th>
                    <td>
                        <span class="badge 
                            {{ $application->status == 'approved' ? 'bg-success' : 
                               ($application->status == 'rejected' ? 'bg-danger' : 'bg-warning') }}">
                            {{ ucfirst($application->status) }}
                        </span>
                    </td>
                </tr>

                <tr>
                    <th>Applied Date</th>
                    <td>{{ $application->created_at->format('d M Y') }}</td>
                </tr>

            </table>

            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('applications.index') }}" class="btn btn-secondary">
                    ← Back
                </a>

                {{-- Optional Actions --}}
                @if(auth()->user()->role === 'admin')
                    <div>
                        <a href="{{ route('applications.approve', $application->id) }}"
                           class="btn btn-success">
                           ✔ Approve
                        </a>

                        <a href="{{ route('applications.reject', $application->id) }}"
                           class="btn btn-danger">
                           ✖ Reject
                        </a>
                    </div>
                @endif
            </div>

        </div>
    </div>

</div>
@endsection
