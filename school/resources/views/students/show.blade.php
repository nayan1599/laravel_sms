@extends('layouts.layouts')
 

@section('title', 'Student Admission Form')



@section('content')

<div class="text-end">
     <button class="btn btn-success no-print" onclick="printInvoice('printArea')">
            <i class="bi bi-printer"></i> Print
        </button>
</div>

<div class="container bg-white p-4 shadow-sm" id="printArea">
    <div class="text-center mb-4">
        <h3 class="fw-bold">Student Admission Form</h3>
        <p><strong>School Name:</strong> {{ $org_settings->organization_name ?? 'My School' }}</p>
    </div>

    <div class="row">
        {{-- Photo --}}
        <div class="col-md-3 text-center">
            @if($student->photo)
                <img src="{{ asset($student->photo) }}" alt="Photo" class="border" width="120">
            @else
                <div class="border p-5">No Photo</div>
            @endif
        </div>

        {{-- Basic Info --}}
        <div class="col-md-9">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th width="30%">Name</th>
                        <td>{{ $student->name }}</td>
                    </tr>
                    <tr>
                        <th>Date of Birth</th>
                        <td>{{ $student->dob ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Gender</th>
                        <td>{{ ucfirst($student->gender) ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Blood Group</th>
                        <td>{{ $student->blood_group ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Religion</th>
                        <td>{{ $student->religion ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Nationality</th>
                        <td>{{ $student->nationality ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Birth Certificate No</th>
                        <td>{{ $student->birth_cert_no ?? 'N/A' }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <h5 class="mt-4">Contact Information</h5>
    <table class="table table-bordered">
        <tbody>
            <tr>
                <th>Phone</th>
                <td>{{ $student->phone ?? 'N/A' }}</td>
                <th>Email</th>
                <td>{{ $student->email ?? 'N/A' }}</td>
            </tr>
            <tr>
                <th>Present Address</th>
                <td colspan="3">{{ $student->present_address ?? 'N/A' }}</td>
            </tr>
            <tr>
                <th>Permanent Address</th>
                <td colspan="3">{{ $student->permanent_address ?? 'N/A' }}</td>
            </tr>
        </tbody>
    </table>

    <h5 class="mt-4">Guardian Information</h5>
    <table class="table table-bordered">
        <tbody>
            <tr>
                <th>Father's Name</th>
                <td>{{ $student->father_name ?? 'N/A' }}</td>
                <th>Mother's Name</th>
                <td>{{ $student->mother_name ?? 'N/A' }}</td>
            </tr>
            <tr>
                <th>Guardian Phone</th>
                <td>{{ $student->guardian_phone ?? 'N/A' }}</td>
                <th>Occupation</th>
                <td>{{ $student->guardian_occupation ?? 'N/A' }}</td>
            </tr>
        </tbody>
    </table>

    <h5 class="mt-4">Academic Information</h5>
    <table class="table table-bordered">
        <tbody>
            <tr>
                <th>Class</th>
                <td>{{ $student->studentClass->class_name ?? 'N/A' }}</td>
                <th>Section</th>
                <td>{{ $student->section->section_name ?? 'N/A' }}</td>
            </tr>
            <tr>
                <th>Roll</th>
                <td>{{ $student->roll ?? 'N/A' }}</td>
                <th>Admission Date</th>
                <td>{{ $student->admission_date ?? 'N/A' }}</td>
            </tr>
            <tr>
                <th>Previous School</th>
                <td colspan="3">{{ $student->previous_school ?? 'N/A' }}</td>
            </tr>
            <tr>
                <th>Last Exam Result</th>
                <td colspan="3">{{ $student->last_exam_result ?? 'N/A' }}</td>
            </tr>
        </tbody>
    </table>

    <h5 class="mt-4">Remarks</h5>
    <p>{{ $student->remarks ?? 'N/A' }}</p>
    
</div>

<style>
    @media print {
        .btn, .main-header, .sidebar, footer {
            display: none !important;
        }

        #print-area {
            margin: 0;
            padding: 0;
            box-shadow: none;
        }

        table, th, td {
            border: 1px solid black !important;
        }
    }
</style>
@endsection
