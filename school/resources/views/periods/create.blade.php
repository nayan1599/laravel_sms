@extends('layouts.layouts')

@section('content')
<div class="container">
    <h4 class="mb-3">Add Period</h4>

    <form action="{{ route('periods.store') }}" method="POST">
        @csrf

        @include('periods.form')

        <button class="btn btn-success">Save</button>
        <a href="{{ route('periods.index') }}" class="btn btn-secondary">
            Back
        </a>
    </form>
</div>
@endsection
