@extends('layouts.layouts')

@section('content')

<div class="text-end py-2">
    <button class="btn btn-success no-print" onclick="printInvoice('printArea')">
        <i class="bi bi-printer"></i> Print
    </button>
</div>



<div class="container" id="printArea">
    <div class="card">
        <div class="text-center py-3">
            <h4> Class: <strong>{{ $class->class_name }}</strong> Routine</h4>
        </div>

        <div class="pt-3">

            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle mb-0">
                    <thead class="table-light text-center">
                        <tr>
                            <th>Time</th>
                            <th>weeks</th>
                            <th>Subject</th>
                            <th>Class Room</th>
                            <th>Teacher</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($timetable as $row)
                        <tr class="text-center">
                            <td>
                                @if($row->period)
                                {{ \Carbon\Carbon::parse($row->period->start_time)->format('h:i A') }}
                                -
                                {{ \Carbon\Carbon::parse($row->period->end_time)->format('h:i A') }}

                            

                                @endif


                            </td>
                            <td>
                                {{ $row->weeks->day_bn ?? 'N/A' }}
                            </td>

                            <td class="fw-semibold">
                                {{ $row->subject->subject_name ?? '' }}
                            </td>
                            <td>
                                {{ $row->room_id }}
                            </td>
                            <td>
                                {{ $row->teacher->name ?? '' }}
                            </td>


                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>




    </div>









    @endsection