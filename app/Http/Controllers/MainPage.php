<?php

namespace App\Http\Controllers;

class MainPage extends Controller
{
    public function index()
    {
        return view('main')->with([
            'city_name' => 'Lviv'
        ]);
    }
}
