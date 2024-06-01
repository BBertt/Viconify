@extends('layout')
@section('title', 'Video')
@section('content')
<body class="bg-gray-100 text-gray-900">
    <header class="bg-[#E6F5FF] text-black p-4 flex flex-col items-center">
        <div class="flex items-center justify-between w-full">
            <div class="flex items-center space-x-4">
                <a href= {{ route('HomePage') }}>
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </a>
                <span class="text-black font-bold text-xl">Video</span>
            </div>

            <div class="relative flex-grow mx-4">
                <input type="text" id="searchBar" class="bg-white text-black rounded-full px-4 py-2 pl-10 w-full" placeholder="Search">
                <div class="absolute top-0 left-0 flex items-center h-full pl-3">
                    <svg class="text-black h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M15.5 9a6.5 6.5 0 11-13 0 6.5 6.5 0 0113 0z" />
                    </svg>
                </div>
                <div id="recommendations" class="absolute mt-1 bg-white text-black rounded-md shadow-lg w-full max-h-60 overflow-y-auto hidden">
                    <!-- Recommendations will be dynamically added here -->
                </div>
            </div>

            <div class="flex items-center space-x-4">
                @if(Auth::check())
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded">Logout</button>
                    </form>
                @else
                    <a href="{{ route('Login') }}" class="text-black">Login</a>
                    <a href="{{ route('Register') }}" class="text-black">Register</a>
                @endif
            </div>
        </div>

        <div class="mt-2 w-full relative overflow-x-hidden">
            <button id="scrollLeft" class="absolute left-0 top-0 bottom-0 z-10 bg-gray-300 text-black px-3 py-1 rounded-full cursor-pointer hover:bg-gray-400 hidden">&lt;</button>
            <div id="scrollContainer" class="flex space-x-2 py-2 overflow-x-auto scrollbar-hide">
                <!-- Add recommendation items here -->
                <div class="bg-gray-300 text-black px-3 py-1 rounded-full cursor-pointer hover:bg-gray-400 flex-shrink-0 flex-grow-0 inline-flex items-center h-8 whitespace-nowrap">All</div>
                <div class="bg-gray-300 text-black px-3 py-1 rounded-full cursor-pointer hover:bg-gray-400 flex-shrink-0 flex-grow-0 inline-flex items-center h-8 whitespace-nowrap">Mixes</div>
                <div class="bg-gray-300 text-black px-3 py-1 rounded-full cursor-pointer hover:bg-gray-400 flex-shrink-0 flex-grow-0 inline-flex items-center h-8 whitespace-nowrap">Music</div>
                <div class="bg-gray-300 text-black px-3 py-1 rounded-full cursor-pointer hover:bg-gray-400 flex-shrink-0 flex-grow-0 inline-flex items-center h-8 whitespace-nowrap">Games</div>
                <div class="bg-gray-300 text-black px-3 py-1 rounded-full cursor-pointer hover:bg-gray-400 flex-shrink-0 flex-grow-0 inline-flex items-center h-8 whitespace-nowrap">Valorant</div>
                <div class="bg-gray-300 text-black px-3 py-1 rounded-full cursor-pointer hover:bg-gray-400 flex-shrink-0 flex-grow-0 inline-flex items-center h-8 whitespace-nowrap">Python</div>
                <div class="bg-gray-300 text-black px-3 py-1 rounded-full cursor-pointer hover:bg-gray-400 flex-shrink-0 flex-grow-0 inline-flex items-center h-8 whitespace-nowrap">Visual Studio 2022</div>
                <div class="bg-gray-300 text-black px-3 py-1 rounded-full cursor-pointer hover:bg-gray-400 flex-shrink-0 flex-grow-0 inline-flex items-center h-8 whitespace-nowrap">Genshin Impact</div>
                <div class="bg-gray-300 text-black px-3 py-1 rounded-full cursor-pointer hover:bg-gray-400 flex-shrink-0 flex-grow-0 inline-flex items-center h-8 whitespace-nowrap">Laravel 9</div>
                <div class="bg-gray-300 text-black px-3 py-1 rounded-full cursor-pointer hover:bg-gray-400 flex-shrink-0 flex-grow-0 inline-flex items-center h-8 whitespace-nowrap">Adobe Photoshop</div>
                <div class="bg-gray-300 text-black px-3 py-1 rounded-full cursor-pointer hover:bg-gray-400 flex-shrink-0 flex-grow-0 inline-flex items-center h-8 whitespace-nowrap">Blender</div>
                <div class="bg-gray-300 text-black px-3 py-1 rounded-full cursor-pointer hover:bg-gray-400 flex-shrink-0 flex-grow-0 inline-flex items-center h-8 whitespace-nowrap">Unreal Engine</div>
            </div>
            <button id="scrollRight" class="absolute right-0 top-0 bottom-0 z-10 bg-gray-300 text-black px-3 py-1 rounded-full cursor-pointer hover:bg-gray-400">&gt;</button>
        </div>
    </header>

    <div class="container mx-auto py-4 max-w-screen-2xl px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
            @php
            $videoCount = 0;
            $dbCount = 0;
            @endphp
            @for ($i = $videoCount; $i < count($videos); $i++)
                @if($videos[$i]->VideoType === 'Videos' && $videoCount < 8)
                <a href="{{ route('videos.show', $videos[$i]->VideoID)}}">
                        <div class="bg-white rounded-lg shadow-md overflow-hidden m-2">
                            <img src="{{ asset($videos[$i]->VideoImage) }}" alt="{{ $videos[$i]->Title }}" class="w-full h-48 object-cover">
                            <div class="p-4">
                                <div class="flex items-center">
                                    <img src="{{ asset($videos[$i]->user->ProfileImage) }}" alt="{{ $videos[$i]->user->name }}" class="w-10 h-10 rounded-full mr-4">
                                    <div class="flex flex-col truncate w-full">
                                        <h3 class="text-lg font-bold text-black truncate">{{ $videos[$i]->Title }}</h3>
                                        <p class="text-gray-600">{{ $videos[$i]->user->Name }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @php $videoCount++; @endphp
                        @php $dbCount = $i; @endphp
                    @endif
                </a>
            @endfor
        </div>
    </div>

    <div class="container mx-auto py-4 max-w-screen-2xl mt-8 px-4">
        <div class="flex items-center mb-4">
            <svg viewBox="0 0 24 24" class="w-6 h-6 mr-2" xmlns="http://www.w3.org/2000/svg">
                <path fill="currentColor" d="M10 9V5l7 7-7 7v-4H4V9h6z"/>
            </svg>
            <span class="text-black font-bold text-xl">Shorts</span>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-4 shorts-container">
            @php $shortCount = 0; @endphp
            @foreach ($videos as $video)
                @if($video->VideoType === 'Shorts' && $shortCount < 6)
                    <div class="short-item relative bg-gray-200 rounded-lg overflow-hidden h-96 m-2 transform transition-transform duration-300 hover:scale-110 hover:shadow-lg hover:bg-[#f0f0f0]">
                        <img src="{{ asset($video->VideoImage) }}" alt="{{ $video->Title }}" class="w-full h-full object-cover">
                        <div class="hover-content absolute inset-0 p-4 flex flex-col justify-end opacity-0 transition-opacity duration-300 hover:opacity-100">
                            <div class="flex items-center">
                                <img src="{{ asset($video->user->ProfileImage) }}" alt="{{ $video->user->name }}" class="w-12 h-12 rounded-full mr-4">
                                <div class="flex flex-col truncate w-full">
                                    <h3 class="text-lg font-bold text-black truncate">{{ $video->Title }}</h3>
                                    <p class="text-black-600">{{ $video->user->Name }}</p>
                                    <p class="text-black-600 text-sm">{{ $video->Description }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @php $shortCount++; @endphp
                @endif
            @endforeach
        </div>
    </div>

    <div class="container mx-auto py-24 max-w-screen-2xl px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
            @for ($i = $dbCount + 1; $i < count($videos); $i++)
                @if($videos[$i]->VideoType === 'Videos')
                <a href="{{ route('videos.show', $videos[$i]->VideoID)}}">
                    <div class="bg-white rounded-lg shadow-md overflow-hidden m-2">
                        <img src="{{ $videos[$i]->VideoImage }}" alt="{{ $videos[$i]->Title }}" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <div class="flex items-center">
                                <img src="{{ asset($videos[$i]->user->ProfileImage) }}" alt="{{ $videos[$i]->user->name }}" class="w-10 h-10 rounded-full mr-4">
                                <div class="flex flex-col truncate w-full">
                                    <h3 class="text-lg font-bold text-black truncate">{{ $videos[$i]->Title }}</h3>
                                    <p class="text-gray-600">{{ $videos[$i]->user->Name }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                @endif
            @endfor
        </div>
    </div>

@endsection

@push('scripts')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <script src="{{ asset('js/home.js') }}"></script>
@endpush
