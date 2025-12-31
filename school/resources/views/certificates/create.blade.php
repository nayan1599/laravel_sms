@extends('layouts.layouts')

@section('content')
<div class="container">
    <div class="   ">
        <div class="card-header mb-3">
            <h4>Add School Certificate</h4>
        </div>

        <div class="card-body">
            <form action="{{ route('certificates.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label>Student Name</label>
                    <input type="text" name="student_name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Father Name</label>
                    <input type="text" name="father_name" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Class</label>
                    <input type="text" name="class" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Roll</label>
                    <input type="text" name="roll" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Certificate Type</label>
                    <select name="certificate_type" class="form-select" required>
                        <option value="">Select Type</option>
                        <option value="bonafide">Bonafide</option>
                        <option value="character">Character</option>
                        <option value="testimonial">Testimonial</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label>Issue Date</label>
                    <input type="date" name="issue_date" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Remarks</label>
                    <textarea name="remarks" class="form-control" rows="3"></textarea>
                </div>

                <button type="submit" class="btn btn-success">Save Certificate</button>
                <a href="{{ route('certificates.index') }}" class="btn btn-secondary">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection
