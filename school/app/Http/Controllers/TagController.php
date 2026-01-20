<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\TagType;
use Illuminate\Http\Request;
// TagType
 

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::latest()->paginate(10);
        return view('tags.index', compact('tags'));
    }

    public function create()
    {
        $types = TagType::all();
        return view('tags.create', compact('types'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100|unique:tags,name',
            'type' => 'required|string|max:50',
            'status' => 'required|boolean',
        ]);

        Tag::create($validated);

        return redirect()->route('tags.index')->with('success', 'Tag created successfully');
    }

    public function edit(Tag $tag)
    {
        return view('tags.edit', compact('tag'));
    }

    public function update(Request $request, Tag $tag)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100|unique:tags,name,' . $tag->id,
            'type' => 'required|string|max:50',
            'status' => 'required|boolean',
        ]);

        $tag->update($validated);

        return redirect()->route('tags.index')->with('success', 'Tag updated successfully');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('tags.index')->with('success', 'Tag deleted successfully');
    }
}
