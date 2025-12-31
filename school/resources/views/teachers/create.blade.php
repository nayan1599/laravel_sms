@extends('layouts.layouts')

@section('content')
<div class="container">
    <h2 class="main-title">Add New Teacher</h2>

    <form action="{{ route('teachers.store') }}" method="POST">
        @csrf

        @include('teachers.partials.form', ['teacher' => null])

        <button type="submit" class="btn btn-primary mt-3">Save</button>
        <a href="{{ route('teachers.index') }}" class="btn btn-secondary mt-3">Cancel</a>
    </form>
</div>
@endsection
