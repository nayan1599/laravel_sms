<?php 
namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::latest()->paginate(10);
        return view('banners.index', compact('banners'));
 
    }

    public function create()
    {
        return view('banners.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'subtitle' => 'nullable',
            'image' => 'nullable|image',
            'status' => 'boolean'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('banners', 'public');
        }

        Banner::create($data);
        return redirect()->route('banners.index')->with('success', 'Banner created successfully.');
    }

    public function edit(Banner $banner)
    {
        return view('banners.edit', compact('banner'));
    }

    public function update(Request $request, Banner $banner)
    {
        $data = $request->validate([
            'title' => 'required',
            'subtitle' => 'nullable',
            'image' => 'nullable|image',
            'status' => 'boolean'
        ]);

        if ($request->hasFile('image')) {
            if ($banner->image) {
                Storage::disk('public')->delete($banner->image);
            }
            $data['image'] = $request->file('image')->store('banners', 'public');
        }

        $banner->update($data);
        return redirect()->route('banners.index')->with('success', 'Banner updated successfully.');
    }

    public function destroy(Banner $banner)
    {
        if ($banner->image) {
            Storage::disk('public')->delete($banner->image);
        }
        $banner->delete();
        return redirect()->route('banners.index')->with('success', 'Banner deleted.');
    }
}
