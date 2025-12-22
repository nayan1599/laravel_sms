@extends('layouts.layouts')
@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col-lg-6 margin-tb">
            <div class="pull-left">
                <h2>Marks Management</h2>
            </div>

        </div>
        <div class="col-lg-6 margin-tb">
            <div class="pull-right pt-2 text-end">
                <a class="btn btn-success" href="{{ route('marks.create') }}"> Add New Mark</a>
               
            </div>
        </div>

    </div>

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>

    @endif
    <table class="table table-bordered">
        <tr>

            <th>Student</th>
            <th>Exam</th>
            <th>Subject</th>
            <th>Marks Obtained</th>
            <th>Total Marks</th>
            <th>Grade</th>
            <th>Remarks</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($marks as $mark)
        <tr>

            <td>{{ $mark->student->name }}</td>
            <td>{{ $mark->exam->exam_name }}</td>
            <td>{{ $mark->subject->subject_name }}</td>
            <td>{{ $mark->marks_obtained }}</td>
            <td>{{ $mark->total_marks }}</td>
            <td>{{ $mark->grade }}</td>
            <td>{{ $mark->remarks }}</td>
            <td>
                <div class="d-flex gap-2">
                    <a class="btn btn-info" href="{{ route('marks.show',$mark->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('marks.edit',$mark->id) }}">Edit</a>
                    <form action="{{ route('marks.destroy',$mark->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>

            </td>
        </tr>
        @endforeach
    </table>
    {{ $marks->links() }}
</div>
@endsection