@extends('layouts.layouts')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between mb-3">
        <h4>Periods</h4>
        <a href="{{ route('periods.create') }}" class="btn btn-primary">
            + Add Period
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped align-middle">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Period No</th>
                <th>Name</th>
                <th>Start</th>
                <th>End</th>
                <th>Duration (Min)</th>
                <th>Type</th>
                <th>Order</th>
                <th width="140">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($periods as $period)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $period->period_number }}</td>
                    <td>{{ $period->name ?? '-' }}</td>
                    <td>{{ $period->start_time }}</td>
                    <td>{{ $period->end_time }}</td>
                    <td>{{ $period->duration_min }}</td>
                    <td>
                        @if($period->is_break)
                            <span class="badge bg-warning text-dark">Break</span>
                        @else
                            <span class="badge bg-success">Class</span>
                        @endif
                    </td>
                    <td>{{ $period->sort_order }}</td>
                    <td>
                        <a href="{{ route('periods.edit', $period->id) }}"
                           class="btn btn-sm btn-warning">Edit</a>

                        <form action="{{ route('periods.destroy', $period->id) }}"
                              method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Delete this period?')"
                                    class="btn btn-sm btn-danger">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="text-center text-muted">
                        No periods found
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
