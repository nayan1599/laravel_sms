<?php
 
namespace App\Http\Controllers;

use App\Models\SchoolCommittee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SchoolCommitteeController extends Controller
{
    public function index()
    {
        $committees = SchoolCommittee::latest()->paginate(10);
        return view('committee.index', compact('committees'));
    }

    public function create()
    {
        return view('committee.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'status' => 'required|in:active,inactive',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('profile_photo')) {
            $data['profile_photo'] = $request->file('profile_photo')->store('committee_photos', 'public');
        }

        SchoolCommittee::create($data);

        return redirect()->route('committees.index')->with('success', 'Committee member added successfully.');
    }

    public function edit(SchoolCommittee $committee)
    {
        return view('committee.edit', compact('committee'));
    }

    public function update(Request $request, SchoolCommittee $committee)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'status' => 'required|in:active,inactive',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('profile_photo')) {
            // Delete old photo if exists
            if ($committee->profile_photo) {
                Storage::disk('public')->delete($committee->profile_photo);
            }
            $data['profile_photo'] = $request->file('profile_photo')->store('committee_photos', 'public');
        }

        $committee->update($data);

        return redirect()->route('committees.index')->with('success', 'Committee member updated successfully.');
    }

    public function destroy(SchoolCommittee $committee)
    {
        if ($committee->profile_photo) {
            Storage::disk('public')->delete($committee->profile_photo);
        }
        $committee->delete();

        return redirect()->route('committees.index')->with('success', 'Committee member deleted successfully.');
    }
}

