<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MsVideo;

class RouteController extends Controller
{
    public function HomePage()
    {
        $videos = MsVideo::with('user')->get();
        return view('home', compact('videos'));
    }

    public function Register()
    {
        return view('register');
    }

    public function Login(){
        return view('login');
    }

    public function shorts(){
        return view('short');
    }
}
