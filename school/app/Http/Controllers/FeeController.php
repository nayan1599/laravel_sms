<?php

namespace App\Http\Controllers;

use App\Models\Fee;
use App\Models\Student;
use App\Models\FeeType;
use App\Models\ClassModel;
use App\Models\Account;
use App\Models\AccountCategory;
use App\Models\OrganizationSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class FeeController extends Controller
{
    /* =====================================================
        Fee List + Filters
    ===================================================== */
    public function index(Request $request)
    {
        $query = Fee::with(['student', 'feeType']);

        if ($request->student_name) {
            $query->whereHas('student', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->student_name . '%');
            });
        }

        if ($request->status) {
            $query->where('status', $request->status);
        }

        if ($request->month_year) {
            $query->where('month_year', $request->month_year);
        }

        $fees = $query->latest()->paginate(15);

        return view('fees.index', compact('fees'));
    }

    /* =====================================================
        Create Form
    ===================================================== */
    public function create()
    {
        $students  = Student::all();
        $feeTypes  = FeeType::where('is_active', 1)->get();

        return view('fees.create', compact('students', 'feeTypes'));
    }

    /* =====================================================
        Store Fee + Accounting
    ===================================================== */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id'     => 'required|exists:students,id',
            'fee_type_id'    => 'required|exists:fee_types,id',
            'month_year'     => 'required|date_format:Y-m',
            'amount_due'     => 'required|numeric|min:0',
            'amount_paid'    => 'nullable|numeric|min:0',
            'discount'       => 'nullable|numeric|min:0',
            'fine'           => 'nullable|numeric|min:0',
            'due_date'       => 'required|date',
            'payment_date'   => 'nullable|date',
            'payment_method' => 'nullable|in:CASH,BKASH,NAGAD,BANK,CARD,OTHER',
            'remarks'        => 'nullable|string|max:255',
        ]);

        DB::transaction(function () use ($validated) {

            // 🔹 Calculate Paid Amount = Due - Discount
            $amountDue = $validated['amount_due'] ?? 0;
            $discount   = $validated['discount'] ?? 0;

            $paid = max($amountDue - $discount, 0);


            $update = $paid + $discount;

            // 🔹 Determine status
            if ($paid <= 0) {
                $status = 'PENDING';
            } elseif ($paid < $amountDue) {
                $status = 'PARTIAL';
            } elseif ($update <= 0) {
                $status = 'PAID';
            } {
                $status = 'PAID';
            }

            // 🔹 Auto generate transaction_id (invoice number)
            $lastFee = Fee::latest('id')->first();
            $nextId = $lastFee ? $lastFee->id + 1 : 1;
            $transactionId = 'INV-' . now()->format('Ymd') . '-' . str_pad($nextId, 6, '0', STR_PAD_LEFT);

            // 🔹 Create Fee
            $fee = Fee::create(array_merge($validated, [
                'amount_paid'    => $paid,
                'status'         => $status,
                'transaction_id' => $transactionId,
            ]));

            // 🔹 Create accounting entry only if paid
            if ($paid > 0) {
                $category = AccountCategory::where('type', 'income')
                    ->where('name', 'Fee')
                    ->first();

                Account::create([
                    'category_id'      => $category->id ?? null,
                    'transaction_type' => 'income',
                    'title'            => $fee->feeType->name,
                    'amount'           => $paid,
                    'reference_no'     => $fee->transaction_id,
                    'transaction_date' => $validated['payment_date'] ?? now(),
                    'description'      => $validated['remarks'],
                    'created_by'       => Auth::id(),
                ]);
            }
        });

        return redirect()
            ->route('fees.index')
            ->with('success', 'Fee record created successfully.');
    }



    /* =====================================================
        Edit Form
    ===================================================== */
    public function edit(Fee $fee)
    {
        $students = Student::all();
        $feeTypes = FeeType::all();

        return view('fees.edit', compact('fee', 'students', 'feeTypes'));
    }

    /* =====================================================
        Update Fee
    ===================================================== */
    public function update(Request $request, Fee $fee)
    {
        $validated = $request->validate([
            'student_id'     => 'required|exists:students,id',
            'fee_type_id'    => 'required|exists:fee_types,id',
            'month_year'     => 'required|date_format:Y-m',
            'amount_due'     => 'required|numeric|min:0',
            'amount_paid'    => 'nullable|numeric|min:0',
            'discount'       => 'nullable|numeric|min:0',
            'fine'           => 'nullable|numeric|min:0',
            'due_date'       => 'required|date',
            'payment_date'   => 'nullable|date',
            'payment_method' => 'nullable|in:CASH,BKASH,NAGAD,BANK,CARD,OTHER',
            'transaction_id' => 'nullable|string|max:50',
            'remarks'        => 'nullable|string|max:255',
        ]);

        $paid = $validated['amount_paid'] ?? 0;

        if ($paid <= 0) {
            $validated['status'] = 'PENDING';
        } elseif ($paid < $validated['amount_due']) {
            $validated['status'] = 'PARTIAL';
        } else {
            $validated['status'] = 'PAID';
        }

        $fee->update($validated);

        return redirect()
            ->route('fees.index')
            ->with('success', 'Fee record updated successfully.');
    }

    /* =====================================================
        Invoice
    ===================================================== */
    public function invoice($id)
    {
        $fee = Fee::with(['student', 'class', 'account'])->findOrFail($id);
        $classes = ClassModel::all();
        $org_settings = OrganizationSetting::first();

        return view('fees.invoice', compact('fee', 'org_settings', 'classes'));
    }


    /* =====================================================
        Delete Fee
    ===================================================== */
    public function destroy(Fee $fee)
    {
        $fee->delete();

        return redirect()
            ->route('fees.index')
            ->with('success', 'Fee record deleted successfully.');
    }
}
