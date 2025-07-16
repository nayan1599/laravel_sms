@extends('layouts.layouts')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>📊 Marksheet - {{ $student->name }}</h2>
        <button class="btn btn-outline-secondary" onclick="window.print()">
            🖨️ Print
        </button>
    </div>

    <div class="card shadow-sm p-4">
        <h5 class="mb-3">🎓 Student Information</h5>
        <table class="table table-bordered w-50">
            <tr><th>Name</th><td>{{ $student->name }}</td></tr>
            <tr><th>Roll No</th><td>{{ $student->roll_no }}</td></tr>
            <tr><th>Class</th><td>{{ $student->class->class_name ?? 'N/A' }}</td></tr>
            <tr><th>Exam</th><td>{{ $exam->exam_name }}</td></tr>
        </table>

        <h5 class="mt-4">📘 Subject-wise Marks</h5>
        <table class="table table-bordered text-center">
            <thead class="table-light">
                <tr>
                    <th>Subject</th>
                    <th>Obtained Marks</th>
                    <th>Total Marks</th>
                    <th>Grade</th>
                    <th>Remarks</th>
                </tr>
            </thead>
            <tbody>
                @foreach($marks as $mark)
                    <tr>
                        <td>{{ $mark->subject->subject_name ?? 'N/A' }}</td>
                        <td>{{ $mark->marks_obtained }}</td>
                        <td>{{ $mark->total_marks }}</td>
                        <td>{{ $mark->grade }}</td>
                        <td>{{ $mark->remarks }}</td>
                    </tr>
                @endforeach
                <tr class="fw-bold table-secondary">
                    <td>Total</td>
                    <td>{{ $total_obtained }}</td>
                    <td>{{ $total_marks }}</td>
                    <td colspan="2">Average: {{ round($total_obtained / count($marks), 2) }}</td>
                </tr>
            </tbody>
        </table>

        <p class="mt-3">
            <strong>Result:</strong>
            @if($marks->contains(fn($m) => strtolower($m->grade) == 'f'))
                ❌ <span class="text-danger">Fail</span>
            @else
                ✅ <span class="text-success">Pass</span>
            @endif
        </p>
    </div>
</div>
@endsection
