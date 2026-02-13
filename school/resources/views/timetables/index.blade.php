@extends('layouts.app')

@section('content')

<div class="container">

    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white fw-bold">
            📘 Class Routine List
        </div>

        <div class="card-body">

            <table class="table table-bordered table-hover text-center align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Class Name</th>
                   
                        <th>Capacity</th>
                        <th>Group Name</th>
                        <th>Exam Group</th>
                        <th>Medium</th>
                        <th>Section</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($classes as $key => $row)
                    <tr>
                        <td>{{ $classes->firstItem() + $key }}</td>
                        <td class="fw-semibold"> {{ $row->class->class_name ?? '' }}</td>
                        <td>{{ $row->class->capacity }}</td>
                        <td>{{ $row->class->group_name}}</td>
                        <td>{{ $row->class->exam_group}}</td>
                        <td>{{ $row->class->medium}}</td>
                        <td>{{ $row->class->section}}</td>
                        <td>
                            <a href="{{ route('timetables.show', $row->class_id) }}"
                                class="btn btn-sm btn-info text-white">
                                View Full Routine
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3">
                            <div class="alert alert-warning mb-0">
                                No Routine Found
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            {{ $classes->links() }}

        </div>
    </div>

</div>

@endsection