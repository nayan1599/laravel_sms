<?php

namespace App\Http\Controllers;

use App\Models\Fee;
use App\Models\Student;
use App\Models\FeeType;
use App\Models\OrganizationSetting;
use App\Models\ClassModel; // adjust if your model name is different
use Illuminate\Http\Request;

class FeeController extends Controller
{
    // ===================== [ Fee List + Filters ] =====================
    public function index(Request $request)
    {
        $query = Fee::with(['student', 'class']);

        // Filtering
        if ($request->student_name) {
            $query->whereHas('student', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->student_name . '%');
            });
        }

        if ($request->class_id) {
            $query->where('class_id', $request->class_id);
        }

        if ($request->status) {
            $query->where('payment_status', $request->status);
        }

        if ($request->month) {
            $month = \Carbon\Carbon::parse($request->month);
            $query->whereMonth('due_date', $month->month)
                ->whereYear('due_date', $month->year);
        }

        $totalamount = Fee::selectRaw('fee_type, class_id, SUM(amount) as total_amount')
            ->groupBy('fee_type', 'class_id')
            ->with(['feeType', 'class'])
            ->get();



        $fees = $query->latest()->paginate(10);
        $classes = ClassModel::all();

        return view('fees.index', compact('fees', 'classes', 'totalamount'));
    }
    public function details(Request $request, $feeType, $class)
    {

    $fees = Fee::with(['student','feeType','class'])
        ->where('fee_type', $feeType)
        ->where('class_id', $class)
        ->when(request('search'), function ($q) {
            $q->whereHas('student', function ($s) {
                $s->where('name', 'like', '%' . request('search') . '%');
            });
        })
        ->latest()
        ->get();

        return view('fees.details', compact('fees'));
    }
    // ===================== [ Create Form ] =====================
    public function create()
    {
        $feetypes = FeeType::whereNull('expiry_date')->orWhere('expiry_date', '>=', \Carbon\Carbon::today())
            ->get();
        $students = Student::all();
        $classes = ClassModel::all();
        return view('fees.create', compact('students', 'classes', 'feetypes'));
    }

    // ===================== [ Store Fee ] =====================
    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id'     => 'required|exists:students,id',
            'class_id'       => 'required|exists:classes,id',
            'fee_type'       => 'required|string|max:50',
            'amount'         => 'required|numeric|min:0',
            'due_date'       => 'required|date',
            'payment_date'   => 'nullable|date',
            'payment_status' => 'required|in:pending,paid,partial,overdue',
            'paid_amount'    => 'nullable|numeric|min:0',
            'remarks'        => 'nullable|string|max:255',
        ]);

        // 🔹 Auto Receipt Number Generate
        $lastFee = Fee::latest('id')->first();
        $nextNumber = $lastFee ? $lastFee->id + 1 : 1;

        $validated['receipt_number'] = 'RCPT-' . now()->year . '-' . str_pad($nextNumber, 6, '0', STR_PAD_LEFT);
        $validated['payment_date'] = $validated['payment_date'] ?? now()->toDateString();
        Fee::create($validated);
        return redirect()->route('fees.index')->with('success', 'Fee record added successfully.');
    }


    // ===================== [ Edit Form ] =====================
    public function edit($id)
    {
        $feetypes = FeeType::all();
        $fee = Fee::findOrFail($id);
        $students = Student::all();
        $classes = ClassModel::all();
        return view('fees.edit', compact('fee', 'students', 'classes',  'feetypes'));
    }

    // ===================== [ Update Fee ] =====================
    public function update(Request $request, Fee $fee)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'class_id' => 'required|exists:classes,id',
            'fee_type' => 'required|string|max:50',
            'amount' => 'required|numeric|min:0',
            'due_date' => 'required|date',
            'payment_date' => 'nullable|date', // Remove after_or_equal rule
            'payment_status' => 'required|in:pending,paid,partial,overdue',
            'paid_amount' => 'nullable|numeric|min:0',
            'receipt_number' => 'nullable|string|max:50|unique:fees,receipt_number',
            'remarks' => 'nullable|string|max:255',
        ]);

        $fee->update($request->all());

        return redirect()->route('fees.index')->with('success', 'Fee record updated successfully.');
    }

    // ==============================[ Invoice ]==============================



    public function invoice($id)
    {
        $fee = Fee::findOrFail($id);
        $classes = ClassModel::all();
        $org_settings = OrganizationSetting::first();

        return view('fees.invoice', compact('fee', 'org_settings', 'classes'));
    }

    // ===================== [ Delete Fee ] =====================
    public function destroy(Fee $fee)
    {
        $fee->delete();
        return redirect()->route('fees.index')->with('success', 'Fee record deleted successfully.');
    }
}
