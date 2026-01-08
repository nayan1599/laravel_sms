@extends('layouts.app')

@section('title', 'Take Teacher Attendance')

@section('content')
<div class="container">
    <div class="card shadow">
        <div class="card-header bg-success text-white">
            <h5 class="mb-0">Take Teacher Attendance</h5>
        </div>

        <form method="POST" action="{{ route('attendance.store') }}">
            @csrf

            <div class="card-body">

                <div class="mb-3">
                    <label class="form-label">Attendance Date</label>
                    <input type="date" name="attendance_date"
                           class="form-control"
                           value="{{ date('Y-m-d') }}" required>
                </div>

                <table class="table table-bordered text-center">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Teacher</th>
                            <th>Present</th>
                            <th>Absent</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($teachers as $key => $teacher)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $teacher->name }}</td>
                            <td>
                                <input type="radio"
                                       name="attendances[{{ $teacher->id }}]"
                                       value="present" checked>
                            </td>
                            <td>
                                <input type="radio"
                                       name="attendances[{{ $teacher->id }}]"
                                       value="absent">
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>

            <div class="card-footer text-end">
                <button class="btn btn-success">Save Attendance</button>
                <a href="{{ route('teacherattendance.index') }}"
                   class="btn btn-secondary">Back</a>
            </div>
        </form>
    </div>
</div>
@endsection
