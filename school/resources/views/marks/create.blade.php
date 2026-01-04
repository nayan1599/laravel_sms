@extends('layouts.layouts')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Mark</h2>
            </div>
            <div class="pull-right pt-2 text-end">
                <a class="btn btn-primary" href="{{ route('marks.index') }}"> Back</a>
            </div>
        </div>


        <div class="row"> @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                @foreach ($errors->all() as $error)
                {{ $error }}<br>
                @endforeach

            </div>
            @endif
            <form class="row g-3" action="{{ route('marks.store') }}" method="POST">
                @csrf

                <div class="mb-3 col-md-6">
                    <label class="form-label">Student</label>
                    <select name="student_id" class="form-select" required>
                        <option value="">Select</option>
                        @foreach($students as $student)
                        <option value="{{ $student->id }}">{{ $student->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3 col-md-6">
                    <label class="form-label">Exam</label>
                    <select name="exam_id" class="form-select" required>
                        <option value="">Select</option>
                        @foreach($exams as $exam)
                        <option value="{{ $exam->id }}">{{ $exam->exam_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3 col-md-6">
                    <label class="form-label">Subject</label>
                    <select name="subject_id" class="form-select" required>
                        <option value="">Select</option>
                        @foreach($subjects as $subject)
                        <option value="{{ $subject->id }}">{{ $subject->subject_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3 col-md-6">
                    <label class="form-label">Marks Obtained</label>
                    <input type="number" step="0.01" name="marks_obtained" class="form-control" required>
                </div>

                <div class="mb-3 col-md-6">
                    <label class="form-label">Total Marks</label>
                    <input type="number" name="total_marks" class="form-control" value="100">
                </div>

                <div class="mb-3 col-md-6">
                    <label class="form-label">Grade</label>
                    <input type="text" name="grade" class="form-control">
                </div>

                <div class="mb-3 col-md-6">
                    <label class="form-label">Remarks</label>
                    <textarea name="remarks" class="form-control"></textarea>
                </div>

<!-- submit button  -->
                <div class="mb-3 col-md-6">
                    <button class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        @endsection