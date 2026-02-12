@extends('layouts.layouts')

@section('content')
<div class="container">
    <h2 class="mb-4 main-title">Create Time Table</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('timetables.store') }}" method="POST">
        @csrf

        <div class="row">

            {{-- Academic Year --}}
            <div class="col-md-4 mb-3">
                <label class="form-label">Academic Year</label>
                <select name="academic_year_id" class="form-select" required>
                    <option value="">Select Year</option>
                         <option value="2026">2026</option>
                         <option value="2027">2027</option>
                         <option value="2028">2028</option>
                         <option value="2029">2029</option>
                         <option value="2030">2030</option>

              
                </select>
            </div>

            {{-- Class --}}
            <div class="col-md-4 mb-3">
                <label class="form-label">Class</label>
                <select name="class_id" class="form-select" required>
                    <option value="">Select Class</option>
                    @foreach($classes as $class)
                        <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Day --}}
            <div class="col-md-4 mb-3">
                <label class="form-label">Day</label>
                <select name="day_of_week" class="form-select" required>
                    @foreach ($weeks as $week )
                        <option value="{{ $week->id }}">{{ $week->day_bn }}</option>
                    @endforeach
         
                </select>
            </div>

            {{-- Period --}}
            <div class="col-md-4 mb-3">
                <label class="form-label">Period</label>
                <select name="period_id" class="form-select" required>
                    <option value="">Select Period</option>
                    @foreach($periods as $period)
                        <option value="{{ $period->id }}">{{ $period->name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Subject --}}
            <div class="col-md-4 mb-3">
                <label class="form-label">Subject</label>
                <select name="subject_id" class="form-select" required>
                    <option value="">Select Subject</option>
                    @foreach($subjects as $subject)
                        <option value="{{ $subject->id }}">{{ $subject->subject_name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Teacher --}}
            <div class="col-md-4 mb-3">
                <label class="form-label">Teacher</label>
                <select name="teacher_id" class="form-select" required>
                    <option value="">Select Teacher</option>
                    @foreach($teachers as $teacher)
                        <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Room --}}
            <div class="col-md-4 mb-3">
                <label class="form-label">Room (Optional)</label>
                <select name="room_id" class="form-select">
                    <option value="">Select Room</option>
                    @foreach($rooms as $room)
                        <option value="{{ $room->id }}">{{ $room->room_name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Status --}}
            <div class="col-md-4 mb-3">
                <label class="form-label">Status</label>
                <select name="is_active" class="form-select">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>

            {{-- Notes --}}
            <div class="col-md-12 mb-3">
                <label class="form-label">Notes</label>
                <textarea name="notes" class="form-control" rows="3"></textarea>
            </div>

        </div>

        <button type="submit" class="btn btn-primary">Save Routine</button>
        <a href="{{ route('timetables.index') }}" class="btn btn-secondary">Back</a>

    </form>
</div>
@endsection
