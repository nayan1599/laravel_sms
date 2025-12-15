@extends('layouts.layouts')
@section('title','Application Details')
@section('content')
<div class="container py-4">
    <div class="card shadow border-0">
        <div class="card-header bg-dark text-white">
            <h5 class="mb-0">Application Details</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Name</th>
                    <td>{{ $application->name }}</td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td>{{ $application->phone }}</td>
                </tr>
                <tr>
                    <th>Gender</th>
                    <td>{{ ucfirst($application->gender) }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>{{ ucfirst($application->status) }}</td>
                </tr>
            </table>
            <div class="text-end">
                <a href="{{ route('applications.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>
</div>
@endsection