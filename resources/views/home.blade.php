@extends('layout')
@section('title', 'Login')
@section('content')
    <header>
        <nav>
            @if(Auth::check())
                <form action={{route('logout')}} method="POST">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            @else
                <a href="{{ route('Login') }}">Login</a>
                <a href="{{ route('Register') }}">Register</a>
            @endif
        </nav>
    </header>
@endsection
