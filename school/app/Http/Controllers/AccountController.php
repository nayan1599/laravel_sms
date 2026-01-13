<?php

namespace App\Http\Controllers; // <-- Must be first after <?php

use App\Models\Account;
use App\Models\AccountCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{
    public function index()
    {
        $accounts = Account::with('category')
            ->latest()
            ->get();

        $totalIncome = Account::where('transaction_type', 'income')
            ->sum('amount');

        $totalExpense = Account::where('transaction_type', 'expense')
            ->sum('amount');

        return view('accounts.index', compact(
            'accounts',
            'totalIncome',
            'totalExpense'
        ));
    }

    public function create()
    {
        $categories = AccountCategory::where('status', 1)->get();
        return view('accounts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id'       => 'required|exists:account_categories,id',
            'transaction_type'  => 'required|in:income,expense',
            'title'             => 'required|string|max:255',
            'amount'            => 'required|numeric|min:0',
            'transaction_date'  => 'required|date',
        ]);

        Account::create([
            'category_id'      => $request->category_id,
            'transaction_type' => $request->transaction_type,
            'title'            => $request->title,
            'amount'           => $request->amount,
            'transaction_date' => $request->transaction_date,
            'reference_no'     => $request->reference_no,
            'description'      => $request->description,
            'created_by'       => Auth::id(),
        ]);

        return redirect()->route('accounts.index')
            ->with('success', 'Record added successfully');
    }

    public function edit(Account $account)
    {
        $categories = AccountCategory::where('status', 1)->get();
        return view('accounts.edit', compact('account', 'categories'));
    }

    public function update(Request $request, Account $account)
    {
        $request->validate([
            'category_id'       => 'required|exists:account_categories,id',
            'transaction_type'  => 'required|in:income,expense',
            'title'             => 'required|string|max:255',
            'amount'            => 'required|numeric|min:0',
            'transaction_date'  => 'required|date',
        ]);

        $account->update([
            'category_id'      => $request->category_id,
            'transaction_type' => $request->transaction_type,
            'title'            => $request->title,
            'amount'           => $request->amount,
            'transaction_date' => $request->transaction_date,
            'reference_no'     => $request->reference_no,
            'description'      => $request->description,
        ]);

        return redirect()->route('accounts.index')
            ->with('success', 'Record updated successfully');
    }

    public function destroy(Account $account)
    {
        $account->delete();
        return back()->with('success', 'Record deleted');
    }
}
