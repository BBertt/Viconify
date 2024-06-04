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
                    <a href="{{ route('login') }}" class="text-black">Login</a>
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

    <div class="container mx-auto p-4 flex flex-col">
        <div class="flex justify-center w-full h-full">
            <div class="w-11/12 flex justify-center space-x-4">
                <div class="flex flex-wrap -mx-4">
                    @php
                    $videoCount = 0;
                    $dbCount = 0;
                    @endphp
                    @for ($i = $videoCount; $i < count($videos); $i++)
                        @if($videos[$i]->VideoType === 'Videos' && $videoCount < 8)
                            <div class="w-full md:w-1/2 lg:w-1/4 px-4 mb-8">
                                <div class="videocontainer bg-white rounded-lg overflow-hidden h-full hover:bg-gray-300 transition duration-300">
                                    <a href="{{ route('videos.show', $videos[$i]->VideoID)}}">
                                        <div class="relative overflow-hidden w-full h-50 sm:h-50 md:h-44 lg:h-32 xl:h-44 rounded-lg">
                                            <img src="{{$videos[$i]->VideoImage}}" alt="{{ $videos[$i]->VideoImage }}" class="w-full h-full object-cover">
                                            <div class="w-full h-full absolute inset-0 flex items-center justify-center bg-black bg-opacity-0 hover:bg-opacity-50 transition duration-300">
                                                <div class="flex items-center justify-center w-full h-full text-white text-lg font-bold opacity-0 hover:opacity-100">Watch Now</div>
                                            </div>
                                        </div>
                                        <div class="flex flex-row p-2 pt-3">
                                            <div class="mt-1 overflow-hidden rounded-full h-10 w-10 flex-shrink-0">
                                                @if($videos[$i]->user->ProfileImage)
                                                    <img src="{{$videos[$i]->user->ProfileImage}}" alt="{{ $videos[$i]->VideoImage }}" class="h-full object-cover w-full rounded-full">
                                                @else
                                                    <img src="{{asset('Assets/DefaultProfile.png')}}" alt="{{ $videos[$i]->VideoImage }}" class="h-full object-cover w-full rounded-full">
                                                @endif
                                            </div>
                                            <div class="pl-2 flex-1 max-w-full">
                                                <h2 class="text-base font-bold whitespace-nowrap overflow-hidden text-ellipsis p-0 m-0"><span>{{ Str::limit($videos[$i]->Title, 32, ' ...') }}</span></h2>
                                                <p class="text-sm text-gray-600">{{ $videos[$i]->user->Name }}</p>
                                                <span class="text-sm text-gray-600">{{ $videos[$i]->Views }} views</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @php $videoCount++; @endphp
                        @php $dbCount = $i; @endphp
                        @endif
                    @endfor
                </div>
            </div>
        </div>
    </div>

    <div class="container mx-auto p-4 flex flex-col">
        <div class="flex justify-center w-full h-full">
            <div class="w-11/12 flex justify-center space-x-4">
                <div class="container max-w-screen-2xl">
                    <div class="flex items-center">
                        <span class="text-black font-bold text-xl">Shorts</span>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-4 shorts-container">
                        @php $shortCount = 0; @endphp
                        @foreach ($videos as $video)
                            @if($video->VideoType === 'Shorts' && $shortCount < 6)
                                <div class="short-item relative bg-gray-200 rounded-lg overflow-hidden h-96 m-2 transform transition-transform duration-300 hover:scale-110 hover:shadow-lg hover:bg-[#f0f0f0]">
                                    <img src="{{ asset($video->VideoImage) }}" alt="{{ $video->Title }}" class="w-full h-full object-cover">
                                    <div class="hover-content absolute inset-0 p-4 flex flex-col justify-end opacity-0 transition-opacity duration-300 hover:opacity-100">
                                        <div class="flex">
                                            <div class="mt-1 overflow-hidden rounded-full h-10 w-10 flex-shrink-0">
                                                @if($videos[$i]->user->ProfileImage)
                                                    <img src="{{$videos[$i]->user->ProfileImage}}" alt="{{ $videos[$i]->VideoImage }}" class="h-full object-cover w-full rounded-full">
                                                @else
                                                    <img src="{{asset('Assets/DefaultProfile.png')}}" alt="{{ $videos[$i]->VideoImage }}" class="h-full object-cover w-full rounded-full">
                                                @endif
                                            </div>
                                            <div class="pl-2 flex-1 max-w-full">
                                                <h2 class="text-base text-gray-100 font-bold whitespace-nowrap overflow-hidden text-ellipsis p-0 m-0"><span>{{ Str::limit($videos[$i]->Title, 12, ' ...') }}</span></h2>
                                                <p class="text-sm text-gray-300">{{ $videos[$i]->user->Name }}</p>
                                                <span class="text-sm text-gray-300">{{ $videos[$i]->Views }} views</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @php $shortCount++; @endphp
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mx-auto p-4 flex flex-col">
        <div class="flex justify-center w-full h-full">
            <div class="w-11/12 flex justify-center space-x-4">
                <div class="flex flex-wrap -mx-4">
                    @for ($i = $dbCount; $i < count($videos); $i++)
                        @if($videos[$i]->VideoType === 'Videos')
                            <div class="w-full md:w-1/2 lg:w-1/4 px-4 mb-8">
                                <div class="videocontainer bg-white rounded-lg overflow-hidden h-full hover:bg-gray-300 transition duration-300">
                                    <a href="{{ route('videos.show', $videos[$i]->VideoID)}}">
                                        <div class="relative overflow-hidden w-full h-50 sm:h-50 md:h-44 lg:h-32 xl:h-44 rounded-lg">
                                            <img src="{{$videos[$i]->VideoImage}}" alt="{{ $videos[$i]->VideoImage }}" class="w-full h-full object-cover">
                                            <div class="w-full h-full absolute inset-0 flex items-center justify-center bg-black bg-opacity-0 hover:bg-opacity-50 transition duration-300">
                                                <div class="flex items-center justify-center w-full h-full text-white text-lg font-bold opacity-0 hover:opacity-100">Watch Now</div>
                                            </div>
                                        </div>
                                        <div class="flex flex-row p-2 pt-3">
                                            <div class="mt-1 overflow-hidden rounded-full h-10 w-10 flex-shrink-0">
                                                @if($videos[$i]->user->ProfileImage)
                                                    <img src="{{$videos[$i]->user->ProfileImage}}" alt="{{ $videos[$i]->VideoImage }}" class="h-full object-cover w-full rounded-full">
                                                @else
                                                    <img src="{{asset('Assets/DefaultProfile.png')}}" alt="{{ $videos[$i]->VideoImage }}" class="h-full object-cover w-full rounded-full">
                                                @endif
                                            </div>
                                            <div class="pl-2 flex-1 max-w-full">
                                                <h2 class="text-base font-bold whitespace-nowrap overflow-hidden text-ellipsis p-0 m-0"><span>{{ Str::limit($videos[$i]->Title, 32, ' ...') }}</span></h2>
                                                <p class="text-sm text-gray-600">{{ $videos[$i]->user->Name }}</p>
                                                <span class="text-sm text-gray-600">{{ $videos[$i]->Views }} views</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endif
                    @endfor
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <script src="{{ asset('js/home.js') }}"></script>
@endpush
