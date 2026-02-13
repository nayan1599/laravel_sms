@extends('layouts.app')

@section('content')
<div class="container">

    <a href="{{ route('class-teachers.create') }}"
       class="btn btn-primary mb-3">Assign Teacher</a>

    <table class="table table-bordered">
        <tr>
            <th>Class</th>
            <th>Section</th>
            <th>Teacher</th>
            <th>Year</th>
            <th>Action</th>
        </tr>

        @foreach($data as $row)
        <tr>
            <td>{{ $row->class->name ?? '' }}</td>
            <td>{{ $row->section->name ?? '' }}</td>
            <td>{{ $row->teacher->name ?? '' }}</td>
            <td>{{ $row->academic_year }}</td>

            <td>
                <a href="{{ route('class-teachers.edit',$row->id) }}"
                   class="btn btn-warning btn-sm">Edit</a>

                <form action="{{ route('class-teachers.destroy',$row->id) }}"
                      method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach

    </table>
</div>
@endsection
