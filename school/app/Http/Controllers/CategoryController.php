<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    // List all categories
    public function index()
    {
        $categories = Category::latest()->paginate(10);
        return view('categories.index', compact('categories'));
    }

    // Show create form
    public function create()
    {
     
        return view('categories.create');
    }

    // Store new category
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:150',
            'slug' => 'required|unique:categories,slug',
            'description' => 'nullable',
            'status' => 'required|boolean',
        ]);

        Category::create($request->all());
        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    // Show edit form
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    // Update category
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|max:150',
            'slug' => 'required|unique:categories,slug,' . $category->id,
            'description' => 'nullable',
            'status' => 'required|boolean',
        ]);

        $category->update($request->all());
        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    // Delete category
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }

    public function show($slug)
    {
        $category = \App\Models\Category::where('slug', $slug)->firstOrFail();
        $posts = \App\Models\Post::where('category_id', $category->id)->get();
        return view('categories.show', compact('category', 'posts'));
    }
}
