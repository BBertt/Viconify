@extends('layout')
@section('title', 'Video')
@section('content')
<body class="bg-gray-100 text-gray-900">
    <header class="bg-[#E6F5FF] text-black p-4 flex flex-col items-center">
        <div class="flex items-center justify-between w-full">
            <div class="flex items-center space-x-4">
                <a href= {{route('videos.index')}}>
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

    <main class="container mx-auto py-6 max-w-screen-2xl px-6">
        <section class="flex flex-col lg:flex-row gap-4">
            <div class="w-full lg:w-2/3">
                <div class="bg-white shadow rounded-lg overflow-hidden">
                    <img src="https://via.placeholder.com/800x400" alt="Video Thumbnail" class="w-full">
                    <div class="p-4">
                        <h1 class="text-2xl font-bold mb-2">{{ $video->Title }}</h1>
                        <div class="flex items-center space-x-4 mb-4">
                            <img src="{{ $video->user->ProfileImage }}" alt="{{ $video->user->Name }}" class="w-10 h-10 rounded-full">
                            <div class="flex-grow">
                                <h2 class="font-bold">{{ $video->user->Name }}</h2>
                            </div>
                            <div class="flex items-center space-x-4">
                                <div class="flex items-center bg-white text-black px-4 py-2 border border-black rounded-full">
                                    <button class="flex items-center space-x-2">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </button>
                                    <span class="mx-2">|</span>
                                    <button class="flex items-center space-x-2">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 13l-4-4L5 17"></path>
                                        </svg>
                                    </button>
                                </div>
                                <button class="bg-white text-black px-4 py-2 rounded-full flex items-center space-x-2 border border-black">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>Share</span>
                                </button>
                            </div>
                        </div>
                        <div class="bg-[#C1E5FF] p-4 rounded-lg">
                            <p class="mb-4">{{ $video->Views }} Views • {{ $video->created_at->format('d M Y') }}</p>
                            <div id="description-container" class="relative">
                                <p id="description" class="mb-4 overflow-hidden" style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">
                                    {{ $video->Description }}
                                </p>
                                <button id="more-button" class="text-blue-500 inline" style="display: none;">...more</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Video suggestions -->
            <div class="w-full lg:w-1/3 mt-4 lg:mt-0">
                <div class="flex flex-col space-y-4">
                    <div class="flex items-start space-x-4">
                        <img src="https://via.placeholder.com/120x80" alt="Suggested Video Thumbnail" class="rounded-lg">
                        <div>
                            <h3 class="font-bold">Uplifting Music</h3>
                            <p class="text-gray-600">6K views • 1 hour ago</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-4">
                        <img src="https://via.placeholder.com/120x80" alt="Suggested Video Thumbnail" class="rounded-lg">
                        <div>
                            <h3 class="font-bold">Valorant Episode 7</h3>
                            <p class="text-gray-600">1M views • 2 months ago</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-4">
                        <img src="https://via.placeholder.com/120x80" alt="Suggested Video Thumbnail" class="rounded-lg">
                        <div>
                            <h3 class="font-bold">Character Demo - Xiao</h3>
                            <p class="text-gray-600">3M views • 4 years ago</p>
                        </div>
                    </div>
                    <!-- Add more suggested videos here -->
                </div>
            </div>
        </section>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const description = document.getElementById('description');
            const moreButton = document.getElementById('more-button');

            // Check if the description text is longer than three lines
            if (description.scrollHeight > description.clientHeight) {
                moreButton.style.display = 'inline';
            }

            moreButton.addEventListener('click', function () {
                description.style.webkitLineClamp = 'unset';
                description.style.overflow = 'visible';
                moreButton.remove();
            });
        });
    </script>
</body>
@endsection

@push('scripts')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <script src="{{ asset('js/home.js') }}"></script>
@endpush