@extends('layouts.layouts')

@section('content')
<div class="container-fluid py-4">

    {{-- Page Header --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h3 class="fw-bold mb-0 main-title">Fee Types</h3>
            <small class="text-muted">ফি টাইপ ম্যানেজমেন্ট</small>
        </div>
        <a href="{{ route('fee-types.create') }}" class="btn btn-success">
            + Add Fee Type
        </a>
    </div>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-bordered table-hover mb-0 align-middle">
                <thead class="table-dark">
                    <tr>
                        <th width="5%">#</th>
                        <th>Name</th>
                        <th>বাংলা নাম</th>
                        <th>Code</th>
                        <th>Frequency</th>
                        <th>Recurring</th>
                        <th>Refundable</th>
                        <th>Status</th>
                        <th width="15%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($feeTypes as $index => $fee)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td class="fw-semibold">{{ $fee->name }}</td>
                            <td>{{ $fee->name_bn ?? '—' }}</td>
                            <td>
                                <span class="badge bg-info">{{ $fee->code ?? 'N/A' }}</span>
                            </td>
                            <td>{{ str_replace('_', ' ', $fee->frequency) }}</td>
                            <td>
                                @if($fee->is_recurring)
                                    <span class="badge bg-primary">Yes</span>
                                @else
                                    <span class="badge bg-secondary">No</span>
                                @endif
                            </td>
                            <td>
                                @if($fee->is_refundable)
                                    <span class="badge bg-warning text-dark">Yes</span>
                                @else
                                    <span class="badge bg-secondary">No</span>
                                @endif
                            </td>
                            <td>
                                @if($fee->is_active)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('fee-types.edit', $fee->id) }}"
                                   class="btn btn-sm btn-warning">
                                    Edit
                                </a>

                                <form action="{{ route('fee-types.destroy', $fee->id) }}"
                                      method="POST"
                                      class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center py-4 text-muted">
                                No Fee Types Found
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
