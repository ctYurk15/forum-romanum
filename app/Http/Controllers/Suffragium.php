<?php

namespace App\Http\Controllers;

class Suffragium extends Controller
{
    public function all()
    {
        return view('suffragium/all');
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
