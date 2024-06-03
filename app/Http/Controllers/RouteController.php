<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function HomePage()
    {
        return view('home');
    }

    //Try to create view function of chat page
    public function ChatPage()
    {
        return view('chat');
    }

    public function Register()
    {
        return view('register');
    }

    public function Login(){
        return view('login');
    }
}
