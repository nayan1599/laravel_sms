@extends('layouts.layouts')

@section('content')
<div class="container">
    <h3>Edit User</h3>

    <form method="POST" action="{{ route('users.update',$user->id) }}">
        @csrf @method('PUT')

        <input class="form-control mb-2" name="name" value="{{ $user->name }}">
        <input class="form-control mb-2" name="email" value="{{ $user->email }}">
        <input class="form-control mb-2" type="password" name="password" placeholder="New Password">
        <input class="form-control mb-2" type="password" name="password_confirmation" placeholder="Confirm Password">
<select name="role" class="form-control mb-2">
    <option value="admin">Admin</option>
    <option value="teacher">Teacher</option>
</select>
        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
