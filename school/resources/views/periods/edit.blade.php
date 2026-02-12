@extends('layouts.layouts')

@section('content')
<div class="container">
    <h4 class="mb-3">Edit Period</h4>

    <form action="{{ route('periods.update', $period) }}" method="POST">
        @csrf
        @method('PUT')
        @include('periods.form')
   

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('periods.index') }}" class="btn btn-secondary">
            Back
        </a>
    </form>
</div>
@endsection
