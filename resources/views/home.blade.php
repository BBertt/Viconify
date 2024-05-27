@extends('layout')
@section('title', 'Login')
@section('content')
    <header>
        <nav>
            <a href="{{ route('HomePage') }}">Home</a>
            @if(Auth::check())
                <a href="{{ route('logout') }}">Logout</a>
            @else
                <a href="{{ route('Login') }}">Login</a>
                <a href="{{ route('Register') }}">Register</a>
            @endif
        </nav>
    </header>
@endsection
