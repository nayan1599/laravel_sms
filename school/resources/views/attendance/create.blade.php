@extends('layouts.app')

@section('title','Add Attendance for Class')

@section('content')
<div class="container py-4">

    <div class="card shadow">
        <div class="card-header bg-success text-white">
            <h5 class="mb-0"><i class="bi bi-journal-check me-1"></i> Add Attendance for a Class</h5>
        </div>

        <form method="POST" action="{{ route('attendance.store') }}">
            @csrf
            <div class="card-body">

                {{-- Select Class, Section, Subject, Date --}}
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label>Class</label>
                        <select name="class_id" class="form-select" id="class_select" required>
                            <option value="">Select Class</option>
                            @foreach($classes as $class)
                                <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label>Section</label>
                        <select name="section_id" class="form-select" id="section_select" required>
                            <option value="">Select Section</option>
                            @foreach($sections as $section)
                                <option value="{{ $section->id }}">{{ $section->section_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label>Subject (Optional)</label>
                        <select name="subject_id" class="form-select">
                            <option value="">Select Subject</option>
                            @foreach($subjects as $subject)
                                <option value="{{ $subject->id }}">{{ $subject->subject_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label>Date</label>
                        <input type="date" name="attendance_date" class="form-control" value="{{ date('Y-m-d') }}" required>
                    </div>
                </div>

                {{-- Student List --}}
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-light text-center">
                            <tr>
                                <th>#</th>
                                <th>Student Name</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody id="student_table">
                            {{-- Students will load via JS based on class & section --}}
                        </tbody>
                    </table>
                </div>

            </div>

            <div class="card-footer text-end">
                <a href="{{ route('attendance.index') }}" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-success">Save Attendance</button>
            </div>
        </form>
    </div>

</div>

{{-- JS to load students dynamically --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    const classSelect = document.getElementById('class_select');
    const sectionSelect = document.getElementById('section_select');
    const studentTable = document.getElementById('student_table');

    function loadStudents() {
        const classId = classSelect.value;
        const sectionId = sectionSelect.value;

        if(classId && sectionId){
            fetch(`/attendance/by-class-section/${classId}/${sectionId}`)
                .then(res => res.json())
                .then(data => {
                    studentTable.innerHTML = '';
                    data.forEach((student, index) => {
                        studentTable.innerHTML += `
                            <tr>
                                <td class="text-center">${index+1}</td>
                                <td>${student.name}</td>
                                <td>
                                    <select name="statuses[${student.id}]" class="form-select">
                                        <option value="present">Present</option>
                                        <option value="absent">Absent</option>
                                        <option value="late">Late</option>
                                        <option value="leave">Leave</option>
                                    </select>
                                </td>
                            </tr>
                        `;
                    });
                });
        } else {
            studentTable.innerHTML = '';
        }
    }

    classSelect.addEventListener('change', loadStudents);
    sectionSelect.addEventListener('change', loadStudents);
});
</script>
@endsection
