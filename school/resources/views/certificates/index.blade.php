@extends('layouts.layouts')

@section('content')
<div class="container">
    <a href="{{ route('certificates.create') }}" class="btn btn-primary mb-3">➕ Add Certificate</a>

    <table class="table table-bordered">
        <tr>
            <th>Student</th>
            <th>Father Name</th>
            <th>Class</th>
            <th>Type</th>
            <th class="text-end">Action</th>
        </tr>
        @foreach($certificates as $c)
        <tr>
            <td>{{ $c->student_name }}</td>
            <td>{{$c->father_name}}</td>
            <td>{{ $c->class }}</td>
            <td>{{ ucfirst($c->certificate_type) }}</td>
            <td class="text-end">
                <a href="{{ route('certificates.show',$c->id) }}" class="btn btn-info btn-sm">View</a>
                <a href="{{ route('certificates.edit',$c->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('certificates.destroy',$c->id) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
