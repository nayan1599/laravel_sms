<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    // পোস্ট লিস্ট
    public function index()
    {
        $posts = Post::with('category')->latest()->paginate(10);
        return view('posts.index', compact('posts'));
    }

    // পোস্ট তৈরি ফর্ম
    public function create()
    {
        $categories = Category::where('status', 1)->get();
        return view('posts.create', compact('categories'));
    }

    // নতুন পোস্ট সেভ
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:200',
            'slug' => 'required|unique:posts,slug',
            'category_id' => 'required|exists:categories,id',
            'status' => 'required|boolean',
            'feature_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->only(['title', 'slug', 'category_id', 'excerpt', 'content', 'status', 'published_at']);

        // ফিচার ইমেজ আপলোড
        if ($request->hasFile('feature_image')) {
            $imageName = time() . '_' . Str::slug($request->title) . '.' . $request->feature_image->getClientOriginalExtension();
            $request->feature_image->move(public_path('uploads/posts'), $imageName);
            $data['feature_image'] = 'uploads/posts/' . $imageName;
        }

        Post::create($data);

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    // পোস্ট এডিট ফর্ম
    public function edit(Post $post)
    {
        $categories = Category::where('status', 1)->get();
        return view('posts.edit', compact('post', 'categories'));
    }

    // পোস্ট আপডেট
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|max:200',
            'slug' => 'required|unique:posts,slug,' . $post->id,
            'category_id' => 'required|exists:categories,id',
            'status' => 'required|boolean',
            'feature_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->only(['title', 'slug', 'category_id', 'excerpt', 'content', 'status', 'published_at']);

        // ফিচার ইমেজ আপলোড ও পুরানো ছবি ডিলিট
        if ($request->hasFile('feature_image')) {
            if ($post->feature_image && file_exists(public_path($post->feature_image))) {
                unlink(public_path($post->feature_image));
            }
            $imageName = time() . '_' . Str::slug($request->title) . '.' . $request->feature_image->getClientOriginalExtension();
            $request->feature_image->move(public_path('uploads/posts'), $imageName);
            $data['feature_image'] = 'uploads/posts/' . $imageName;
        }

        $post->update($data);

        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }

    // পোস্ট ডিলিট
    public function destroy(Post $post)
    {
        if ($post->feature_image && file_exists(public_path($post->feature_image))) {
            unlink(public_path($post->feature_image));
        }

        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }


    public function show($id)
{
    $post = \App\Models\Post::findOrFail($id);
    return view('posts.show', compact('post'));
}


}