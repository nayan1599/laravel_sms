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
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'notice_date' => 'required|date',
            'expiry_date' => 'nullable|date|after_or_equal:notice_date',
            'status' => 'required|in:active,inactive',
        ]);

        Notice::create($data);

        return redirect()->route('notices.index')->with('success', 'Notice created successfully.');
    }

    public function edit(Notice $notice)
    {
        return view('notices.edit', compact('notice'));
    }

    public function update(Request $request, Notice $notice)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'notice_date' => 'required|date',
            'expiry_date' => 'nullable|date|after_or_equal:notice_date',
            'status' => 'required|in:active,inactive',
        ]);

        $notice->update($data);

        return redirect()->route('notices.index')->with('success', 'Notice updated successfully.');
    }

    public function destroy(Notice $notice)
    {
        $notice->delete();
        return redirect()->route('notices.index')->with('success', 'Notice deleted successfully.');
    }
}
