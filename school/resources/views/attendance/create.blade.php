@extends('layouts.layouts')

@section('content')
<div class="container">
    <h2>Take Attendance</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('attendance.store') }}" method="POST" id="attendanceForm">
        @csrf

        <div class="row mb-3">
            <div class="col-md-3">
                <label>Date</label>
                <input type="date" name="date" class="form-control" value="{{ date('Y-m-d') }}" required>
            </div>

            <div class="col-md-3">
                <label>Class</label>
                <select name="class_id" id="class_id" class="form-select" required>
                    <option value="">Select Class</option>
                    @foreach ($classes as $class)
                        <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3">
                <label>Section</label>
                <select name="section_id" id="section_id" class="form-select" required>
                    <option value="">Select Section</option>
                    @foreach ($sections as $section)
                        <option value="{{ $section->id }}">{{ $section->section_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3">
                <label>Subject</label>
                <select name="subject_id" id="subject_id" class="form-select" required>
                    <option value="">Select Subject</option>
                    @foreach ($subjects as $subject)
                        <option value="{{ $subject->id }}">{{ $subject->subject_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div id="studentList"></div>

        <button type="submit" class="btn btn-success mt-3">Save Attendance</button>
        <a href="{{ route('attendance.index') }}" class="btn btn-secondary mt-3">Back</a>
    </form>
</div>
@endsection

@section('scripts')
<script>
    document.getElementById('section_id').addEventListener('change', function () {
        const classId = document.getElementById('class_id').value;
        const sectionId = this.value;

        if (classId && sectionId) {
            fetch(`/get-students?class_id=${classId}&section_id=${sectionId}`)
                .then(res => res.json())
                .then(data => {
                    let html = `
                        <table class="table table-bordered mt-4">
                            <thead>
                                <tr>
                                    <th>Student Name</th>
                                    <th>Present</th>
                                </tr>
                            </thead>
                            <tbody>
                    `;
                    data.forEach(student => {
                        html += `
                            <tr>
                                <td>${student.name}</td>
                                <td>
                                    <input type="checkbox" name="present_students[]" value="${student.id}" checked>
                                </td>
                            </tr>
                        `;
                    });

                    html += `</tbody></table>`;
                    document.getElementById('studentList').innerHTML = html;
                });
        }
    });
</script>
@endsection
