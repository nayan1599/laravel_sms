<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function index()
    {
        $certificates = Certificate::latest()->get();
        return view('certificates.index', compact('certificates'));
    }

    public function create()
    {
        return view('certificates.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_name' => 'required',
            'class' => 'required',
            'certificate_type' => 'required',
            'issue_date' => 'required'
        ]);

        Certificate::create($request->all());

        return redirect()->route('certificates.index')->with('success', 'Certificate Added');
    }

    public function edit(Certificate $certificate)
    {
        return view('certificates.edit', compact('certificate'));
    }

    public function update(Request $request, Certificate $certificate)
    {
        $certificate->update($request->all());
        return redirect()->route('certificates.index')->with('success', 'Certificate Updated');
    }

    public function destroy(Certificate $certificate)
    {
        $certificate->delete();
        return redirect()->route('certificates.index')->with('success', 'Certificate Deleted');
    }

    public function show(Certificate $certificate)
    {
        return view('certificates.show', compact('certificate'));
    }
}
