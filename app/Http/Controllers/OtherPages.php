<?php

namespace App\Http\Controllers;

class OtherPages extends Controller
{
    public function topRating()
    {
        return view('other/top-rating');
    }
}
