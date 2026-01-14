<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use App\Models\User;
use App\Models\Account;
use App\Models\AccountCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SalaryController extends Controller
{
    public function index()
    {
        $salaries = Salary::with(['employee','account'])->latest()->get();
        return view('salaries.index', compact('salaries'));
    }

    public function create()
    {
        $employees = User::where('role', 'employee')->get();
        return view('salaries.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id'  => 'required|exists:users,id',
            'salary_month' => 'required|date',
            'amount'       => 'required|numeric|min:0',
            'status'       => 'required|in:pending,paid',
        ]);

        DB::transaction(function () use ($request) {

            // 🔹 Salary Expense Category
            $salaryCategory = AccountCategory::where('type','expense')
                ->where('name','Salary')
                ->first();

            // 🔹 Create Account (Expense)
            $account = Account::create([
                'category_id'      => $salaryCategory->id ?? null,
                'transaction_type' => 'expense',
                'title'            => 'Salary Payment',
                'amount'           => $request->amount,
                'transaction_date' => $request->salary_month,
                'description'      => $request->description,
                'created_by'       => Auth::id(),
            ]);

            // 🔹 Create Salary & Link Account
            Salary::create([
                'employee_id'  => $request->employee_id,
                'salary_month' => $request->salary_month,
                'amount'       => $request->amount,
                'status'       => $request->status,
                'paid_at'      => $request->paid_at,
                'description'  => $request->description,
                'account_id'   => $account->id,
                'created_by'   => Auth::id(),
            ]);
        });

        return redirect()->route('salaries.index')
            ->with('success', 'Salary & accounting record created successfully.');
    }

    public function edit(Salary $salary)
    {
        $employees = User::where('role', 'employee')->get();
        return view('salaries.edit', compact('salary','employees'));
    }

    public function update(Request $request, Salary $salary)
    {
        $request->validate([
            'employee_id'  => 'required|exists:users,id',
            'salary_month' => 'required|date',
            'amount'       => 'required|numeric|min:0',
            'status'       => 'required|in:pending,paid',
        ]);

        DB::transaction(function () use ($request, $salary) {

            // 🔹 Update Account
            if ($salary->account) {
                $salary->account->update([
                    'amount'           => $request->amount,
                    'transaction_date' => $request->salary_month,
                    'description'      => $request->description,
                ]);
            }

            // 🔹 Update Salary
            $salary->update([
                'employee_id'  => $request->employee_id,
                'salary_month' => $request->salary_month,
                'amount'       => $request->amount,
                'status'       => $request->status,
                'paid_at'      => $request->paid_at,
                'description'  => $request->description,
            ]);
        });

        return redirect()->route('salaries.index')
            ->with('success', 'Salary & accounting record updated successfully.');
    }

    public function destroy(Salary $salary)
    {
        DB::transaction(function () use ($salary) {
            if ($salary->account) {
                $salary->account->delete(); // or set null if you prefer
            }
            $salary->delete();
        });

        return back()->with('success', 'Salary & accounting record deleted successfully.');
    }
}
