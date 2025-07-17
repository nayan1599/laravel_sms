@extends('layouts.layouts')

@section('content')
<div class="container">
    <h2>{{ $notice->title }}</h2>
    <p><strong>Date:</strong> {{ $notice->notice_date }}</p>
    <p><strong>Expires:</strong> {{ $notice->expiry_date ?? 'N/A' }}</p>
    <p><strong>Status:</strong> {{ ucfirst($notice->status) }}</p>
    <hr>
    <p>{{ $notice->description }}</p>
    <a href="{{ route('notices.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection
