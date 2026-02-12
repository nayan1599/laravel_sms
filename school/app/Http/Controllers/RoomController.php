<?php
namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::latest()->get();
        return view('rooms.index', compact('rooms'));
    }

    public function create()
    {
        return view('rooms.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'room_name' => 'required',
            'room_number' => 'required|unique:rooms',
            'capacity' => 'nullable|integer'
        ]);

        Room::create($request->all());

        return redirect()->route('rooms.index')
            ->with('success', 'Room Created Successfully');
    }

    public function edit(Room $room)
    {
        return view('rooms.edit', compact('room'));
    }

    public function update(Request $request, Room $room)
    {
        $request->validate([
            'room_name' => 'required',
            'room_number' => 'required|unique:rooms,room_number,' . $room->id,
            'capacity' => 'nullable|integer'
        ]);

        $room->update($request->all());

        return redirect()->route('rooms.index')
            ->with('success', 'Room Updated Successfully');
    }

    public function destroy(Room $room)
    {
        $room->delete();

        return redirect()->route('rooms.index')
            ->with('success', 'Room Deleted Successfully');
    }
}


