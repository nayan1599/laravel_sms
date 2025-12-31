<?php 

namespace App\Http\Controllers;

use App\Models\BloodGroup;
use Illuminate\Http\Request;

class BloodGroupController extends Controller
{
    public function index()
    {
        $bloodGroups = BloodGroup::all();
        return view('blood_groups.index', compact('bloodGroups'));
    }

    public function create()
    {
        return view('blood_groups.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:blood_groups|max:10',
        ]);

        BloodGroup::create($request->only('name'));

        return redirect()->route('blood-groups.index')->with('success', 'Blood Group Added Successfully');
    }

    public function edit(BloodGroup $bloodGroup)
    {
        return view('blood_groups.edit', compact('bloodGroup'));
    }

    public function update(Request $request, BloodGroup $bloodGroup)
    {
        $request->validate([
            'name' => 'required|max:10|unique:blood_groups,name,' . $bloodGroup->id,
        ]);

        $bloodGroup->update($request->only('name'));

        return redirect()->route('blood-groups.index')->with('success', 'Updated Successfully');
    }

    public function destroy(BloodGroup $bloodGroup)
    {
        $bloodGroup->delete();
        return redirect()->route('blood-groups.index')->with('success', 'Deleted Successfully');
    }
}
