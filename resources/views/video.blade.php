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

    <div class="container mx-auto py-6 max-w-screen-2xl px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
            <div class="col-span-1 lg:col-span-3">
                <div class="bg-white shadow rounded-lg overflow-hidden">
                    <video controls class="w-full rounded-lg">
                        <source src="{{ asset($video->VideoLinkEmbedded) }}">
                    </video>
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
                                <button class="bg-white text-black px-4 py-2 border border-black rounded-full flex items-center space-x-2">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>Share</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="bg-[#C1E5FF] py-4 px-6">
                        <p class="mb-4 font-bold">{{ $video->Views }} Views • {{ $video->created_at->format('d M Y') }}</p>
                        <div id="description-container" class="relative">
                            <p id="description" class="mb-4 overflow-hidden" style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">{{ $video->Description }}</p>
                            <button id="more-button" class="text-black-500 font-bold inline" style="display: none;">...more</button>
                        </div>
                    </div>

                    <!-- Comment Section -->
                    <div class="bg-white p-4 mt-4 rounded-lg">
                        <h2 class="text-xl font-bold mb-4">7,543 Comments</h2>
                        <div class="flex items-center mb-4">
                            <img src="https://via.placeholder.com/40" alt="User" class="w-10 h-10 rounded-full">
                            <textarea class="w-full p-2 ml-4 border rounded-lg" placeholder="Add a comment..."></textarea>
                        </div>
                        <!-- Example comment -->
                        <div class="mb-4">
                            <div class="flex items-start mb-2">
                                <img src="https://via.placeholder.com/40" alt="User" class="w-10 h-10 rounded-full">
                                <div class="ml-4">
                                    <div class="bg-gray-100 p-3 rounded-lg">
                                        <div class="flex items-center justify-between">
                                            <span class="font-bold">@sinnns3647</span>
                                            <span class="text-gray-500 text-sm">1 year ago (edited)</span>
                                        </div>
                                        <p class="mt-2">2:14 manca is now MOTIVATED</p>
                                    </div>
                                    <div class="flex items-center mt-2 text-gray-500">
                                        <button class="mr-2 flex items-center"><i class="far fa-thumbs-up"></i><span class="ml-1">5K</span></button>
                                        <button class="mr-2 flex items-center"><i class="far fa-thumbs-down"></i></button>
                                        <button class="flex items-center">Reply</button>
                                    </div>
                                </div>
                            </div>
                            <!-- Replies -->
                            <div class="ml-12">
                                <div class="flex items-start mb-2">
                                    <img src="https://via.placeholder.com/40" alt="User" class="w-10 h-10 rounded-full">
                                    <div class="ml-4">
                                        <div class="bg-gray-100 p-3 rounded-lg">
                                            <div class="flex items-center justify-between">
                                                <span class="font-bold">@user2</span>
                                                <span class="text-gray-500 text-sm">1 year ago</span>
                                            </div>
                                            <p class="mt-2">Yes, it's quite exciting!</p>
                                        </div>
                                        <div class="flex items-center mt-2 text-gray-500">
                                            <button class="mr-2 flex items-center"><i class="far fa-thumbs-up"></i></button>
                                            <button class="mr-2 flex items-center"><i class="far fa-thumbs-down"></i></button>
                                            <button class="flex items-center">Reply</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Repeat similar block for more comments -->
                    </div>
                    <!-- End Comment Section -->
                </div>
            </div>

            <!-- Video suggestions -->
            <div class="col-span-1 lg:col-span-1 mt-4 lg:mt-0">
                <div class="flex flex-col space-y-4 overflow-hidden">
                    @foreach ($videos as $vid)
                        @if ($vid->VideoType === 'Videos' && $vid->VideoID !== $video->VideoID)
                            <a href="{{ route('videos.show', $vid->VideoID) }}">
                                <div class="flex items-start space-x-4">
                                    <img src="{{ asset($vid->VideoImage) }}" alt="{{ $vid->Title }}" class="rounded-lg w-[120px] h-[80px] object-cover">
                                    <div class="w-full">
                                        <h3 class="font-bold line-clamp-2">{{ $vid->Title }}</h3>
                                        <p class="text-gray-600">{{ $vid->Views }} Views • {{ $vid->created_at->format('d M Y') }}</p>
                                    </div>
                                </div>
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const description = document.getElementById('description');
            const moreButton = document.getElementById('more-button');

            // Check if the description text is longer than three lines
            if (description.scrollHeight > description.clientHeight) {
                moreButton.style.display = 'inline';
            }

            moreButton.addEventListener('click', function () {
                if (moreButton.innerText === '...more') {
                    description.style.webkitLineClamp = 'unset';
                    description.style.overflow = 'visible';
                    moreButton.innerText = 'Show less';
                } else {
                    description.style.webkitLineClamp = '3';
                    description.style.overflow = 'hidden';
                    moreButton.innerText = '...more';
                }
            });

            description.addEventListener('scroll', function () {
                if (description.scrollTop + description.clientHeight >= description.scrollHeight) {
                    moreButton.style.display = 'inline';
                } else {
                    moreButton.style.display = 'none';
                }
            });
        });
    </script>
</body>
@endsection

@push('scripts')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <script src="{{ asset('js/home.js') }}"></script>
@endpush
