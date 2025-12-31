 @extends('layouts.layouts')

@section('content')
<div class="container py-4">
    <h4 class="main-title">Attendance Details</h4>

    <table class="table table-bordered">
        <tr>
            <th>Teacher Name</th>
            <td>{{ $attendance->teacher->name }}</td>
        </tr>
        <tr>
            <th>Date</th>
            <td>{{ $attendance->date }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ ucfirst($attendance->status) }}</td>
        </tr>
    </table>

    <a href="{{ route('teacherattendance.index', ['date' => $attendance->date]) }}" class="btn btn-secondary">Back</a>
</div>
@endsection
