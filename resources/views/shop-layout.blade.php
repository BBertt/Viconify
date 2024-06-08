<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Default Title')</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div id="sidebar" style="z-index: 10"></div>
    <main>
        <body class="bg-gray-100">
            <header class="bg-[#E6F5FF] text-black p-4 flex flex-col items-center">
                <div class="flex items-center justify-between w-full">
                    <div class="flex items-center space-x-4">
                        <img src="{{ asset('Assets/ViConifyLogo.png') }}" alt="ViConify Logo" class="h-8 w-auto">
                    </div>

                    <div class="relative flex-grow mx-4">
                        <input type="text" id="searchBar" class="bg-white text-black rounded-full px-4 py-2 pl-10 w-full" placeholder="Search">
                        <div class="absolute top-0 left-0 flex items-center h-full pl-3">
                            <svg class="text-black h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M15.5 9a6.5 6.5 0 11-13 0 6.5 6.5 0 0113 0z" />
                            </svg>
                        </div>
                    </div>

                    <div class="flex items-center space-x-4">
                        <a href="{{ route('cart.index') }}">
                            <svg class="text-black h-6 w-6 cursor-pointer" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h18l-2 13H5L3 3zM5 6h14M9 9v6M15 9v6M6 21a1 1 0 100-2 1 1 0 000 2zm12 0a1 1 0 100-2 1 1 0 000 2z" />
                            </svg>
                        </a>
                        <a href="{{ route('transaction') }}">
                            <svg class="text-black h-6 w-6 cursor-pointer" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6 2H14L18 6V22H6V2Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M14 2V6H18" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M8 12H16" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M8 16H16" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M8 8H10" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                              </svg>
                        </a>
                        @if(Auth::check())
                            <form action="{{ route('logout') }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="px-4 py-2 bg-blue-500 text-white font-bold rounded hover:bg-blue-700">Logout</button>
                            </form>
                            <a href="/profile">
                                <div class="mt-1 overflow-hidden rounded-full h-11 w-11 flex-shrink-0">
                                    @if(Auth::user()->ProfileImage)
                                        <img src="{{asset(Auth::user()->ProfileImage)}}" alt="None" class="h-full object-cover w-full rounded-full">
                                    @else
                                        <img src="{{asset('Assets/DefaultProfile.png')}}" alt="None" class="h-full object-cover w-full rounded-full">
                                    @endif
                                </div>
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="text-black">
                                <button class="px-4 py-2 bg-white text-black font-bold rounded border hover:bg-gray-200">Login</button>
                            </a>
                            <a href="{{ route('Register') }}" class="text-black">
                                <button class="px-4 py-2 bg-blue-500 text-white font-bold rounded hover:bg-blue-700">Register</button>
                            </a>
                        @endif
                    </div>
                </div>
            </header>

           @yield('content')

        </body>

        @push('scripts')
            <link rel="stylesheet" href="{{ asset('css/shop/layout.css') }}">
        @endpush
    </main>
    @vite('resources/js/app.tsx')
    @stack('scripts')
</body>
</html>


