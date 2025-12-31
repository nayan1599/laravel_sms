@extends('layouts.app')
@section('content')
<div class="container">
    <h2 class="main-title">Add New Employee</h2>
    <form action="{{ route('employees.store') }}" method="POST">
        @include('employees.form')
    </form>
</div>
@endsection
