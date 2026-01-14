@extends('layouts.app')
@section('title','Accounting')

@section('content')
<div class="container-fluid py-4">


<div class="text-end">
    <a href="{{ route('accounts.create') }}" class="btn btn-sm btn-success mb-3">
    + Add Record
</a>
</div>

<div class="row mb-3">
    <div class="col-md-3">
        <div class="card bg-success text-white">
            <div class="card-body">
                <h6>Total Income</h6>
                <h4>৳ {{ number_format($totalIncome,2) }}</h4>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card bg-danger text-white">
            <div class="card-body">
                <h6>Total Expense</h6>
                <h4>৳ {{ number_format($totalExpense,2) }}</h4>
            </div>
        </div>
    </div>
</div>



<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Type</th>
            <th>Title</th>
            <th>Amount</th>
            <th>Date</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($accounts as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>
                <span class="badge {{ $item->transaction_type=='income'?'bg-success':'bg-danger' }}">
                    {{ ucfirst($item->transaction_type) }}
                </span>
            </td>
            <td>{{ $item->title }}</td>
            <td>৳ {{ $item->amount }}</td>
            <td>{{ $item->transaction_date }}</td>
            <td>
                <a href="{{ route('accounts.edit',$item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('accounts.destroy',$item->id) }}"
                      method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger"
                        onclick="return confirm('Delete?')">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</div>
@endsection
