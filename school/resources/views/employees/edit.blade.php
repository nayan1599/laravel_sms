@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Edit Employee</h2>
    <form action="{{ route('employees.update', $employee->id) }}" method="POST">
        @method('PUT')
        @include('employees.form')
    </form>
</div>
@endsection
