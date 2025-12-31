@extends('layouts.web')

@section('content')
<div class="container top-cat-title">
  <h2 class="main-title text-center">{{ $notices->title }}</h2>
  <p class="">{{ $notices->description }}</p><hr>
  <p><strong>Date:</strong> {{ $notices->notice_date }}</p>
  <p><strong>Expires:</strong> {{ $notices->expiry_date ?? 'N/A' }}</p>
  <p class="mb-2"><strong>Status:</strong> {{ ucfirst($notices->status) }}</p>
  <a href="{{ route('notices.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection