<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use Illuminate\Http\Request;


class NoticeController extends Controller
{
    public function index()
    {
        $notices = Notice::latest()->paginate(10);
        return view('notices.index', compact('notices'));
    }

    public function create()
    {
        return view('notices.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'notice_date' => 'required|date',
            'expiry_date' => 'nullable|date',
            'status' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $notice = new Notice();
        $notice->title = $request->title;
        $notice->description = $request->description;
        $notice->notice_date = $request->notice_date;
        $notice->expiry_date = $request->expiry_date;
        $notice->status = $request->status;

        // ✅ Image Upload
        if ($request->hasFile('image')) {
            $fileName = time() . '_' . $request->image->getClientOriginalName();
            $request->image->move(public_path('uploads/notices'), $fileName);
            $notice->image = 'uploads/notices/' . $fileName;
        }

        $notice->save();

        return redirect()->route('notices.index')->with('success', 'Notice added successfully.');
    }

    public function edit(Notice $notice)
    {
        return view('notices.edit', compact('notice'));
    }

    public function update(Request $request, Notice $notice)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'notice_date' => 'required|date',
            'expiry_date' => 'nullable|date',
            'status' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $notice->update($data);

        return redirect()->route('notices.index')->with('success', 'Notice updated successfully.');
    }



    public function show($id)
    {
        $notices = Notice::findOrFail($id);
        return view('notices.show', compact('notices'));
    }

    public function destroy(Notice $notice)
    {
        $notice->delete();
        return redirect()->route('notices.index')->with('success', 'Notice deleted successfully.');
    }
}
