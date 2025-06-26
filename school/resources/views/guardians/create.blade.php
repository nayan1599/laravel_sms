@extends('layouts.layouts')
@section('content')
<div class="container">
    <h2>Add Guardian</h2>
    <form action="{{ route('guardians.store') }}" method="POST">
        @include('guardians._form')
        <button class="btn btn-success">Save</button>
    </form>
</div>
@endsection
