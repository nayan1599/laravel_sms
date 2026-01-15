@extends('layouts.layouts')

@section('content')

    <div class="card shadow-sm border-0">
        <div class="card-body">
            {{-- Table --}}
            <div class="table-responsive">
                <table class="table align-middle table-hover">
                    <thead class="table-light text-uppercase small">
                        <tr>
                            <th>Student</th>
                            <th>Gender</th>
                            <th>Class</th>
                            <th>Section</th>
                            <th>Roll</th>
                            <th>Contact</th>
                            <th>Guardian</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($students as $student)
                        <tr>
                            {{-- Student Info --}}
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    @if($student->photo)
                                    <img src="{{ asset($student->photo) }}" class="rounded-circle border" width="48" height="48" alt="photo">
                                    @else
                                    <div class="rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center" style="width:48px;height:48px;">
                                        {{ strtoupper(substr($student->name,0,1)) }}
                                    </div>
                                    @endif
                                    <div>
                                        <div class="fw-semibold">{{ $student->name }}</div>
                                        <div class="text-muted small">{{ $student->email ?? 'No email' }}</div>
                                    </div>
                                </div>
                            </td>

                            {{-- Gender --}}
                            <td>
                                <span class="badge bg-{{ $student->gender === 'male' ? 'primary' : 'warning' }}">
                                    {{ ucfirst($student->gender) ?? 'N/A' }}
                                </span>
                            </td>

                            {{-- Class --}}
                            <td>{{ $student->class_name ?? 'N/A' }}</td>

                            {{-- Section --}}
                            <td>{{ $student->section_name ?? 'N/A' }}</td>

                            {{-- Roll --}}
                            <td>{{ $student->roll ?? 'N/A' }}</td>

                            {{-- Contact --}}
                            <td>
                                <div class="small">📞 {{ $student->phone ?? 'N/A' }}</div>
                            </td>

                            {{-- Guardian --}}
                            <td>{{ $student->father_name ?? 'N/A' }}</td>

                            {{-- Actions --}}

                            <td class="text-end">
                                <a href="{{ route('students.show', $student->id) }}"
                                    class="btn btn-sm btn-outline-info me-1"
                                    title="View">
                                    View
                                </a>

                                <a href="{{ route('students.edit', $student->id) }}"
                                    class="btn btn-sm btn-outline-primary me-1"
                                    title="Edit">
                                    Edit
                                </a>

                                <form action="{{ route('students.destroy', $student->id) }}"
                                    method="POST"
                                    class="d-inline"
                                    onsubmit="return confirm('Are you sure to delete this student?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="btn btn-sm btn-outline-danger"
                                        title="Delete">
                                        Delete
                                    </button>
                                </form>
                            </td>

                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted py-4">
                                No students found.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

         
        </div>
    </div>

@endsection