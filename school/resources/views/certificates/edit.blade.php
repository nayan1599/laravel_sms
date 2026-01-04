@extends('layouts.layouts')

@section('content')
<div class="container">
    <h3>Edit Certificate</h3>

    <form action="{{ route('certificates.update',$certificate->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-2">
            <label class="form-label">Student Name</label>
            <input type="text" name="student_name"
                value="{{ $certificate->student_name }}"
                class="form-control" required>
        </div>

        <div class="mb-2">
            <label class="form-label">Class</label>
            <input type="text" name="class"
                value="{{ $certificate->class }}"
                class="form-control" required>
        </div>

        <div class="mb-2">
            <label class="form-label">Certificate Type</label>
            <select name="certificate_type" class="form-control">
                <option value="bonafide" {{ $certificate->certificate_type=='bonafide'?'selected':'' }}>Bonafide</option>
                <option value="character" {{ $certificate->certificate_type=='character'?'selected':'' }}>Character</option>
                <option value="testimonial" {{ $certificate->certificate_type=='testimonial'?'selected':'' }}>Testimonial</option>
            </select>
        </div>

        <button class="btn btn-primary mt-2">Update</button>
    </form>
</div>
@endsection