@extends('layouts.app')

@section('title', 'My Results')

@section('content')
<div class="container-fluid py-4">

    {{-- Header --}}
    <div class="text-center mb-4">
        <h3 class="fw-bold main-title">📊 My Exam Results</h3>
        <p class="text-muted mb-0">
            Student: <strong>{{ auth()->user()->name }}</strong>
        </p>
        <hr class="w-25 mx-auto">
    </div>

<div class="text-end mb-3">
     <!-- print button -->
 <button class="btn btn-success no-print" onclick="printInvoice('printArea')">Print</button>

</div>


    {{-- Student Info --}}
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <h6 class="fw-bold mb-3">👤 Student Information</h6>
                    <p class="mb-1"><strong>Name:</strong> {{ $student->name ?? '-' }}</p>
                    <p class="mb-1"><strong>Roll:</strong> {{ $student->roll ?? '-' }}</p>
                    <p class="mb-0"><strong>Class:</strong> {{ $classModel->class_name ?? '-' }}</p>
                </div>
            </div>
        </div>

        {{-- Summary --}}
        <div class="col-md-8">
            <div class="row g-3">

                <div class="col-md-4">
                    <div class="card shadow-sm border-0 text-center">
                        <div class="card-body">
                            <div class="fs-3">📘</div>
                            <h6 class="fw-bold">Total Subjects</h6>
                            <p class="mb-0">{{ $results->count() }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card shadow-sm border-0 text-center">
                        <div class="card-body">
                            <div class="fs-3">⭐</div>
                            <h6 class="fw-bold">Average</h6>
                            <p class="mb-0">{{ number_format($average, 2) }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card shadow-sm border-0 text-center">
                        <div class="card-body">
                            <div class="fs-3">🏆</div>
                            <h6 class="fw-bold">Result</h6>
                            <span class="badge {{ $passed ? 'bg-success' : 'bg-danger' }}">
                                {{ $passed ? 'PASSED' : 'FAILED' }}
                            </span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


<!-- {{ $exam }} -->
<div class="mb-4">
    <div class="text-center mb-3">
        <h5 class="fw-bold main-title">🏅 Exam: {{ $exam->exam_name ?? 'N/A' }} Mark: {{$exam->total_marks ?? 'N/A'}}</h5>
        <hr class="w-25 mx-auto">
    </div>


    {{-- Results Table --}}
    <div class="card shadow-sm border-0" id="printArea">
        <div class="card-body">
            <h5 class="fw-bold mb-3">📑 Subject Wise Results</h5>

            <div class="table-responsive">
                <table class="table table-bordered align-middle text-center">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Exam</th>
                            <th>Subject</th>
                            <th>Marks</th>
                            <th>Grade</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>

 <!-- {{$results}} -->

                        @forelse($results as $key => $row)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $row->exam->exam_name ?? 'N/A' }}</td>
                            <td class="text-start">{{ $row->subject->subject_name }}</td>
                            <td>{{ $row->marks_obtained }}</td>
                            <td>
                                <span class="badge bg-info">
                                    {{ $row->grade }}
                                </span>
                            </td>
                            <td>
                                @if($row->marks_obtained >= $passMarks)
                                    <span class="badge bg-success">Pass</span>
                                @else
                                    <span class="badge bg-danger">Fail</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-danger">
                                No result data available
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>          

        </div>
    </div>

</div>
@endsection
