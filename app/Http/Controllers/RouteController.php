<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function HomePage()
    {
        return view('home');
    }

    public function Register()
    {
        return view('register');
    }

    public function Login(){
        return view('login');
    }
}
