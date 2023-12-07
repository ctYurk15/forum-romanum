<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class MainPage extends Controller
{
    public function index()
    {
        $logged_in = Auth::check();

        return view('main')->with([
            'city_name' => 'Lviv'
        ]);
    }
}
