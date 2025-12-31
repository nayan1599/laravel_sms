<?php

namespace App\Http\Controllers;
use App\Models\Guardian;
use App\Models\User;
use Illuminate\Http\Request;

class GuardianController extends Controller
{
 
    public function index() {
        $guardians = Guardian::latest()->paginate(10);
        return view('guardians.index', compact('guardians'));
    }

    public function create() {
        $users = User::all();
        return view('guardians.create', compact('users'));
    }

    public function store(Request $request) {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'national_id' => 'nullable|unique:guardians,national_id',
            'relation' => 'required|in:father,mother,guardian',
            'occupation' => 'nullable|string',
            'education_level' => 'nullable|string',
            'income_range' => 'nullable|string',
            'address' => 'nullable|string',
            'emergency_contact' => 'boolean',
            'status' => 'required|in:active,inactive,deceased',
        ]);

        Guardian::create($data);
        return redirect()->route('guardians.index')->with('success', 'Guardian added successfully.');
    }

    public function show(Guardian $guardian) {
        return view('guardians.show', compact('guardian'));
    }

    public function edit(Guardian $guardian) {
        $users = User::all();
        return view('guardians.edit', compact('guardian', 'users'));
    }

    public function update(Request $request, Guardian $guardian) {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'national_id' => 'nullable|unique:guardians,national_id,' . $guardian->id,
            'relation' => 'required|in:father,mother,guardian',
            'occupation' => 'nullable|string',
            'education_level' => 'nullable|string',
            'income_range' => 'nullable|string',
            'address' => 'nullable|string',
            'emergency_contact' => 'boolean',
            'status' => 'required|in:active,inactive,deceased',
        ]);

        $guardian->update($data);
        return redirect()->route('guardians.index')->with('success', 'Guardian updated.');
    }

    public function destroy(Guardian $guardian) {
        $guardian->delete();
        return redirect()->route('guardians.index')->with('success', 'Guardian deleted.');
    }
}
