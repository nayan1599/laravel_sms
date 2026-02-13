@extends('layouts.app')

@section('content')
<div class="container">

<form action="{{ route('class-teachers.update',$item->id) }}" method="POST">
@csrf
@method('PUT')

<select name="class_id" class="form-control mb-2">
    @foreach($classes as $c)
        <option value="{{ $c->id }}"
            {{ $c->id == $item->class_id ? 'selected' : '' }}>
            {{ $c->name }}
        </option>
    @endforeach
</select>

<select name="section_id" class="form-control mb-2">
    @foreach($sections as $s)
        <option value="{{ $s->id }}"
            {{ $s->id == $item->section_id ? 'selected' : '' }}>
            {{ $s->name }}
        </option>
    @endforeach
</select>

<select name="teacher_id" class="form-control mb-2">
    @foreach($teachers as $t)
        <option value="{{ $t->id }}"
            {{ $t->id == $item->teacher_id ? 'selected' : '' }}>
            {{ $t->name }}
        </option>
    @endforeach
</select>

<input type="text"
       name="academic_year"
       value="{{ $item->academic_year }}"
       class="form-control mb-2">

<button class="btn btn-primary">Update</button>

</form>

</div>
@endsection
