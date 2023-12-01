<?php

namespace App\Http\Controllers;

class Symposium extends Controller
{
    public function all()
    {
        return view('symposium/all');
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
