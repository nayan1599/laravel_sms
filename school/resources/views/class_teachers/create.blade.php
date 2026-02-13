@extends('layouts.app')

@section('content')
<div class="container">

<form action="{{ route('class-teachers.store') }}" method="POST">
@csrf

<select name="class_id" class="form-control mb-2">
    @foreach($classes as $c)
        <option value="{{ $c->id }}">{{ $c->name }}</option>
    @endforeach
</select>

<select name="section_id" class="form-control mb-2">
    @foreach($sections as $s)
        <option value="{{ $s->id }}">{{ $s->name }}</option>
    @endforeach
</select>

<select name="teacher_id" class="form-control mb-2">
    @foreach($teachers as $t)
        <option value="{{ $t->id }}">{{ $t->name }}</option>
    @endforeach
</select>

<input type="text"
       name="academic_year"
       placeholder="2025-2026"
       class="form-control mb-2">

<button class="btn btn-success">Save</button>

</form>

</div>
@endsection
