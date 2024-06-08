<?php

namespace App\Http\Controllers;

use App\Models\MsProduct;
use Illuminate\Http\Request;
use App\Models\MsVideo;

class RouteController extends Controller
{
    public function HomePage()
    {
        $products = MsProduct::all();
        $videos = MsVideo::with('user')->get();
        return view('home', compact('videos', 'products'));
    }

    public function Register()
    {
        return view('register');
    }

    public function login(){
        return view('login');
    }

    public function showForm()
    {
        return view('topup');
    }
}
