<?php

namespace App\Http\Controllers;

use App\Models\Poll;

class Suffragium extends Controller
{
    public function all()
    {
        $perPage = 10; // Number of polls per page
        $page = request()->query('page', 1); // Get the 'page' parameter from the URL, default to 1 if not present
        $search = request()->input('name'); // Get the 'search' parameter from the URL

        $query = Poll::query();

        // Apply search filter if a search query is provided
        if ($search) {
            $query->where('poll_name', 'like', '%' . $search . '%');
        }

        $polls = $query->paginate($perPage, ['*'], 'page', $page);

        return view('suffragium/all', ['polls' => $polls]);
    }

    public function single(int $suffragium_id)
    {
        return view('suffragium/single')->with([
            'name' => 'Vote 1',
            'id' => $suffragium_id
        ]);
    }

    public function new()
    {
        return view('suffragium/new');
    }
}
