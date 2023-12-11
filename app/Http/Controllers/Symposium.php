<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;


class Symposium extends Controller
{
    public function all(Request $request)
    {
        $rooms_per_page = 10;

        // Extract the 'page' parameter from the request URL
        $page = $request->query('page', 1);

        // Paginate the rooms using the extracted page number
        $rooms = Room::orderBy('last_message_at', 'desc')->paginate($rooms_per_page, ['*'], 'page', $page);

        // Return the data to a view or in any other way you need
        return view('symposium/all', ['rooms' => $rooms]);
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
}
