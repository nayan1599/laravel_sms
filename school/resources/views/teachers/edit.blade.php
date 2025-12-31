@extends('layouts.layouts')

@section('content')
<div class="container">
    <h2>Edit Teacher</h2>

    <form action="{{ route('teachers.update', $teacher->id) }}" method="POST">
        @csrf
        @method('PUT')

        @include('teachers.partials.form', ['teacher' => $teacher])

        <button type="submit" class="btn btn-primary mt-3">Update</button>
        <a href="{{ route('teachers.index') }}" class="btn btn-secondary mt-3">Cancel</a>
    </form>
</div>
@endsection
