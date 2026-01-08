@extends('layouts.layouts')
 
@section('content')
<div class="container py-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Take Student Attendance</h4>
        </div>
        <div class="card-body">

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('attendance.store') }}" method="POST" id="attendanceForm">
                @csrf

                <div class="row g-3 mb-3">
                    <div class="col-md-3">
                        <label class="form-label">Date <span class="text-danger">*</span></label>
                        <input type="date" name="date" class="form-control" value="{{ date('Y-m-d') }}" required>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Class <span class="text-danger">*</span></label>
                        <select name="class_id" id="class_id" class="form-select" required>
                            <option value="">Select Class</option>
                            @foreach ($classes as $class)
                                <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Section <span class="text-danger">*</span></label>
                        <select name="section_id" id="section_id" class="form-select" required>
                            <option value="">Select Section</option>
                            @foreach ($sections as $section)
                                <option value="{{ $section->id }}">{{ $section->section_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Subject <span class="text-danger">*</span></label>
                        <select name="subject_id" id="subject_id" class="form-select" required>
                            <option value="">Select Subject</option>
                            @foreach ($subjects as $subject)
                                <option value="{{ $subject->id }}">{{ $subject->subject_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div id="studentList" class="mt-4"></div>

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('attendance.index') }}" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-success">Save Attendance</button>
                </div>
            </form>
        </div>
    </div>
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
                        <div class="table-responsive">
                        <table class="table table-bordered table-striped align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th>Student Name</th>
                                    <th class="text-center">Present</th>
                                </tr>
                            </thead>
                            <tbody>
                    `;
                    if (data.length > 0) {
                        data.forEach(student => {
                            html += `
                                <tr>
                                    <td>${student.name}</td>
                                    <td class="text-center">
                                        <input type="checkbox" name="present_students[]" value="${student.id}" checked>
                                    </td>
                                </tr>
                            `;
                        });
                    } else {
                        html += `
                            <tr>
                                <td colspan="2" class="text-center text-muted">No students found for selected class and section.</td>
                            </tr>
                        `;
                    }

                    html += `
                            </tbody>
                        </table>
                        </div>
                    `;

                    document.getElementById('studentList').innerHTML = html;
                })
                .catch(err => {
                    document.getElementById('studentList').innerHTML = '<div class="alert alert-danger">Error loading students.</div>';
                });
        } else {
            document.getElementById('studentList').innerHTML = '';
        }
    });
</script>
@endsection
