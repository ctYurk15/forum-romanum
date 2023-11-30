<?php

namespace App\Http\Controllers;

class Auth extends Controller
{
    public function loginPage()
    {
        return view('auth/login');
    }

    public function registerPage()
    {
        return view('auth/register');
    }
}
