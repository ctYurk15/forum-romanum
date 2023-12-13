<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class Symposium extends Controller
{
    public function all(Request $request)
    {
        $rooms = $this->getRooms($request);
        return view('symposium/all', ['rooms' => $rooms]);
    }

    private function getRooms(Request $request)
    {
        $rooms_per_page = 10;

        // Extract the 'page' and 'name' parameters from the request URL
        $page = $request->query('page', 1);
        $nameFilter = $request->query('name');

        // Build the query with the name filter
        $query = Room::orderBy('last_message_at', 'desc');

        if ($nameFilter) {
            $query->where('title', 'like', '%' . $nameFilter . '%');
        }

        // Paginate the rooms using the extracted page number
        $rooms = $query->paginate($rooms_per_page, ['*'], 'page', $page);

        return $rooms;
    }

    public function single(int $symposium_id)
    {
        return view('symposium/single')->with([
            'name' => 'Discussion1',
            'id' => $symposium_id
        ]);
    }

    public function new()
    {
        return view('symposium/new');
    }

    public function save(Request $request)
    {
        // Validate form data
        $request->validate([
            'room_name' => 'required|string|max:255',
            'room_description' => 'nullable|string',
        ]);

        // Create a new room
        $room = new Room([
            'title' => $request->input('room_name'),
            'description' => $request->input('room_description'),
            'creator_id' => Auth::user()->id
            // Add any other necessary fields
        ]);

        // Save the room
        $room->save();

        // Redirect back or to a specific page
        return redirect()->route('symposium', ['symposium_id' => $room->id])->with('success', 'Room created successfully!');
    }
}
