@extends('layouts.layouts')

@section('content')
<div class="container mt-4">
    <h2 class="main-title">Create Organization Settings</h2>

    <form action="{{ route('organization_settings.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        @include('organization_settings.form')

        <button type="submit" class="btn btn-success">Save Settings</button>
    </form>
</div>
@endsection
