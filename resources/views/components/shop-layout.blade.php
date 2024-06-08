@extends('components.layout')
@section('title')
    @yield('title')
@endsection

@section('searchBar')
    <div class="relative flex-grow mx-4">
        <input type="text" id="searchBar" class="bg-white text-black rounded-full px-4 py-2 pl-10 w-full" placeholder="Search">
        <div class="absolute top-0 left-0 flex items-center h-full pl-3">
            <svg class="text-black h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M15.5 9a6.5 6.5 0 11-13 0 6.5 6.5 0 0113 0z" />
            </svg>
        </div>
    </div>
@endsection

@section('content')
    @yield('content')

    @push('scripts')
        <link rel="stylesheet" href="{{ asset('css/shop/layout.css') }}">
    @endpush
@endsection
