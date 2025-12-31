@extends('layouts.layouts')
@section('content')
<div class="container">
    <h2>Edit Guardian</h2>
    <form action="{{ route('guardians.update', $guardian->id) }}" method="POST">
        @csrf @method('PUT')
        @include('guardians._form')
        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
