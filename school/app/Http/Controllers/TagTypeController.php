<?php

namespace App\Http\Controllers;

use App\Models\TagType;
use Illuminate\Http\Request;

class TagTypeController extends Controller
{
    public function index()
    {
        $types = TagType::latest()->paginate(10);
        return view('types.index', compact('types'));
    }

    public function create()
    {
        return view('types.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:50|unique:tag_types,name',
            'description' => 'nullable|string',
            'status' => 'required|boolean',
        ]);

        TagType::create($validated);

        return redirect()->route('tag-types.index')
            ->with('success', 'Tag Type created successfully');
    }

    public function edit(TagType $tagType)
    {
        return view('types.edit', compact('tagType'));
    }

    public function update(Request $request, TagType $tagType)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:50|unique:tag_types,name,' . $tagType->id,
            'description' => 'nullable|string',
            'status' => 'required|boolean',
        ]);

        $tagType->update($validated);

        return redirect()->route('types.index')
            ->with('success', 'Tag Type updated successfully');
    }

    public function destroy(TagType $tagType)
    {
        if ($tagType->tags()->count()) {
            return back()->with('error', 'This type has tags. Cannot delete.');
        }

        $tagType->delete();

        return redirect()->route('types.index')
            ->with('success', 'Tag Type deleted successfully');
    }
}
