@extends('layouts.layouts')
@section('content')
<div class="container">
    <h3>Student Details</h3>

    <p><strong>Name:</strong> {{ $students->name }}</p>
    <p><strong>Class:</strong> {{ $students->class }}</p>

    <hr>

     

    <hr>
 
</div>
@endsection
