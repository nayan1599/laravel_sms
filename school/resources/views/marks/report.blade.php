@extends('layouts.layouts')

@section('content')
<style>
    @media print {
        .no-print {
            display: none !important;
        }

        body {
            background: #fff !important;
        }

        .card {
            box-shadow: none !important;
            border: none !important;
        }

        .footer {
            display: none !important;
        }

        .main-nav--bg {
            display: none !important;
        }
    }
</style>

<div class="container py-4">

    <!-- Header -->
    <div class="text-center mb-4">
        <h2 class="fw-bold text-uppercase mb-1">ABC Model School</h2>
        <p class="mb-0">Annual / Final Examination Mark Sheet</p>
        <hr class="w-50 mx-auto">
    </div>

    <!-- Actions -->
    <div class="text-end mb-3 no-print">
        <button onclick="window.print()" class="btn btn-sm btn-primary">
            🖨️ Print Marksheet
        </button>
    </div>

    <div class="card border-0 shadow-sm p-4">

        <!-- Student Info -->
        <table class="table table-sm table-bordered mb-4">
            <tbody>
                <tr>
                    <th width="20%">Student Name</th>
                    <td width="30%">{{ $student->name }}</td>
                    <th width="20%">Roll No</th>
                    <td width="30%">{{ $student->roll_no }}</td>
                </tr>
                <tr>
                    <th>Class</th>
                    <td>{{ $student->class->class_name ?? 'N/A' }}</td>
                    <th>Exam</th>
                    <td>{{ $exam->exam_name }}</td>
                </tr>
            </tbody>
        </table>

        <!-- Marks Table -->
        <table class="table table-bordered text-center align-middle">
            <thead class="table-light">
                <tr>
                    <th>Sl</th>
                    <th>Subject</th>
                    <th>Marks Obtained</th>
                    <th>Total Marks</th>
                    <th>Grade</th>
                    <th>Remarks</th>
                </tr>
            </thead>
            <tbody>
                @php
                $sl = 1;
                @endphp

                @foreach($marks as $mark)
                <tr>
                    <td>{{ $sl++ }}</td>
                    <td class="text-start">{{ $mark->subject->subject_name ?? 'N/A' }}</td>
                    <td>{{ $mark->marks_obtained }}</td>
                    <td>{{ $mark->total_marks }}</td>
                    <td>
                        <span class="fw-bold
                            {{ strtolower($mark->grade) == 'f' ? 'text-danger' : 'text-success' }}">
                            {{ $mark->grade }}
                        </span>
                    </td>
                    <td>{{ $mark->remarks ?? '-' }}</td>
                </tr>
                @endforeach

                <!-- Summary -->
                <tr class="fw-bold table-secondary">
                    <td colspan="2">Total</td>
                    <td>{{ $total_obtained }}</td>
                    <td>{{ $total_marks }}</td>
                    <td colspan="2">
                        Average:
                        {{ count($marks) ? round($total_obtained / count($marks), 2) : 0 }}
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- Result -->
        <div class="mt-3">
            <strong>Final Result :</strong>
            @if($marks->contains(fn($m) => strtolower($m->grade) == 'f'))
            <span class="badge bg-danger fs-6">FAIL</span>
            @else
            <span class="badge bg-success fs-6">PASS</span>
            @endif
        </div>

        <!-- Signatures -->
        <div class="row mt-5 text-center">
            <div class="col-md-4">
                <hr>
                <p class="mb-0 fw-semibold">Class Teacher</p>
            </div>
            <div class="col-md-4">
                <hr>
                <p class="mb-0 fw-semibold">Exam Controller</p>
            </div>
            <div class="col-md-4">
                <hr>
                <p class="mb-0 fw-semibold">Principal</p>
            </div>
        </div>

    </div>
</div>
@endsection