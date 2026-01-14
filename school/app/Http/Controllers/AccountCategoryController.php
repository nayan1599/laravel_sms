<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
namespace App\Http\Controllers;

use App\Models\AccountCategory;
use Illuminate\Http\Request;

class AccountCategoryController extends Controller
{
    public function index()
    {
        $categories = AccountCategory::latest()->get();
        return view('account_categories.index', compact('categories'));
    }

   public function create()
{
    $incomeCategories = AccountCategory::where('type', 'income')->get();
    $expenseCategories = AccountCategory::where('type', 'expense')->get();

    return view('accounts.create', compact('incomeCategories', 'expenseCategories'));
}


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:income,expense',
        ]);

        AccountCategory::create($request->all());

        return redirect()->route('account-categories.index')
            ->with('success', 'Category created successfully');
    }

    public function edit(AccountCategory $account_category)
    {
        return view('account_categories.edit', compact('account_category'));
    }

    public function update(Request $request, AccountCategory $account_category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:income,expense',
        ]);

        $account_category->update($request->all());

        return redirect()->route('account-categories.index')
            ->with('success', 'Category updated successfully');
    }

    public function destroy(AccountCategory $account_category)
    {
        $account_category->delete();

        return back()->with('success', 'Category deleted successfully');
    }
}
