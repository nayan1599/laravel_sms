@extends('layouts.layouts')

@section('content')
<div class="container">
    <h3>Create User</h3>

    <form method="POST" action="{{ route('users.store') }}">
        @csrf

        <input class="form-control mb-2" name="name" placeholder="Name">
        <input class="form-control mb-2" name="email" placeholder="Email">
        <input class="form-control mb-2" type="password" name="password" placeholder="Password">
        <input class="form-control mb-2" type="password" name="password_confirmation" placeholder="Confirm Password">
<select name="role" class="form-control mb-2">
    <option value="admin">Admin</option>
    <option value="teacher">Teacher</option>
</select>
        <button class="btn btn-success">Save</button>
    </form>
</div>
@endsection
