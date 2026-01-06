@extends('layouts.app')

@section('title', 'Edit Leave Application')

@section('content')
<div class="container-fluid py-4">

    {{-- Page Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-0 main-title">Edit Leave Application</h4>
            <small class="text-muted">আপনার ছুটির দরখাস্ত আপডেট করুন</small>
        </div>
        <a href="{{ route('leave.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Back
        </a>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-7">

            <div class="card border-0 shadow-sm">
                <div class="card-body">

                    {{-- Error --}}
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{ route('leave.update', $leave->id) }}" method="POST">
                        @csrf
                        @method('PUT') <!-- Important! -->

                        <!-- From Date -->
                        <input type="date" name="from_date" value="{{ old('from_date', $leave->from_date) }}" required>

                        <!-- To Date -->
                        <input type="date" name="to_date" value="{{ old('to_date', $leave->to_date) }}" required>

                        <!-- stutas  -->
   <div class="mb-3">
        <label>Status</label>
        <select name="status" class="form-control" required>
            <option value="approved" {{ $leave->status=='approved' ? 'selected' : '' }}>Approve</option>
            <option value="rejected" {{ $leave->status=='rejected' ? 'selected' : '' }}>Reject</option>
        </select>
    </div>

                        <!-- Reason -->
                        <textarea name="reason" required>{{ old('reason', $leave->reason) }}</textarea>

                        <button type="submit">Update</button>
                    </form>

                </div>
            </div>

        </div>
    </div>

</div>
@endsection