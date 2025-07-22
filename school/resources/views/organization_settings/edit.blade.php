@extends('layouts.layouts')

@section('content')
<div class="container mt-4">
    <h2 class="main-title">Edit Organization Settings</h2>

    <form action="{{ route('organization_settings.update', $organization_setting->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('organization_settings.form', ['setting' => $organization_setting])

        <button type="submit" class="btn btn-primary">Update Settings</button>
    </form>
</div>
@endsection
