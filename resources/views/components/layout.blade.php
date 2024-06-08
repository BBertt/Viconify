<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>@yield('title')</title>
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

                        @yield('searchBar')

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
                                <div class="relative grid place-items-center" x-data="{ open:false }">
                                    {{-- Dropdown  menu button --}}
                                    <button @click="open = !open" type="button" class="mt-1 overflow-hidden rounded-full h-11 w-11 flex-shrink-0 relative z-30">
                                        @if(Auth::user()->ProfileImage)
                                            <img src="{{asset(Auth::user()->ProfileImage)}}" alt="None" class="h-full object-cover w-full rounded-full">
                                        @else
                                            <img src="{{asset('Assets/DefaultProfile.png')}}" alt="None" class="h-full object-cover w-full rounded-full">
                                        @endif
                                    </button>
            
                                    {{-- Dropdown menu --}}
                                    <div x-show="open" @click.outside="open=false" class="bg-white shadow-lg absolute top-10 right-0 rounded-lg overflow-hidden font-light z-20 w-48">
                                        <p class="username p-4">{{ Auth::user()->Name }}</p>
                                        <a href="/profile" class="hover:bg-slate-100 pl-4 pr-8 py-2 flex justify-center">
                                            Edit Profile
                                        </a>
                                        @if (Auth::user()->Role == 'user')
                                            <a href="{{ route('shop.register.index') }}" class="hover:bg-slate-100 pl-4 pr-8 py-2 flex justify-center">
                                                Register Shop
                                            </a>
                                        @endif
                                        <form action="{{ route('logout') }}" method="POST" class="block w-full">
                                            @csrf
                                            <button type="submit" class="w-full px-4 py-2 text-black font-bold hover:bg-slate-100">Logout</button>
                                        </form>
                                    </div>
                                </div>
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

                    @yield('suggestion')

                </header>

            @yield('content')

            </body>

        </main>
    @vite('resources/js/app.tsx')
    @stack('scripts')
</body>
</html>



