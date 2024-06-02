@extends('layout')
@section('title', 'Home')
@section('content')
<body class="text-gray-900">

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
                <svg class="text-black h-6 w-6 cursor-pointer" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h18l-2 13H5L3 3zM5 6h14M9 9v6M15 9v6M6 21a1 1 0 100-2 1 1 0 000 2zm12 0a1 1 0 100-2 1 1 0 000 2z" />
                </svg>
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
                <!-- Left Image -->
                <div class="w-3/12 h-12/12 overflow-hidden">
                    <img src="{{ asset('Assets/TestImg1.jpg') }}" alt="" class="rounded-xl h-full w-full object-cover">
                </div>
                <!-- Carousel -->
                <div id="carousel" class="w-6/12 relative h-full">
                    <div class="carousel-inner relative w-full h-full overflow-hidden rounded-xl">
                        <div class="carousel-item active">
                            <img src="{{ asset('Assets/TestImg.jpg') }}" class="block h-full object-cover w-full rounded-xl" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('Assets/TestImg1.jpg') }}" class="block h-full object-cover w-full rounded-xl" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('Assets/HomeBanner.png') }}" class="block h-full object-cover w-full rounded-xl" alt="Third slide">
                        </div>
                    </div>
                    <button id="prev" class="absolute top-0 bottom-0 left-0 flex items-center justify-center p-0 text-center border-0 bg-transparent" style="transform: translateY(-50%); top: 50%;" type="button">
                        <span class="carousel-control-prev-icon inline-block bg-no-repeat" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </button>
                    <button id="next" class="absolute top-0 bottom-0 right-0 flex items-center justify-center p-0 text-center border-0 bg-transparent" style="transform: translateY(-50%); top: 50%;" type="button">
                        <span class="carousel-control-next-icon inline-block bg-no-repeat" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </button>
                </div>
                <!-- Right Images -->
                <div class="w-3/12 h-12/12 flex flex-col space-y-4">
                    <div class="w-full h-full overflow-hidden">
                        <img src="{{ asset('Assets/TestImg1.jpg') }}" alt="" class="rounded-xl h-full w-full object-cover">
                    </div>
                    <div class="h-full overflow-hidden">
                        <img src="{{ asset('Assets/TestImg1.jpg') }}" alt="" class="rounded-xl h-full w-full object-cover">
                    </div>
                </div>
            </div>
        </div>

        <!-- New Collection -->
        <div class="relative mt-8 flex justify-center">
            <img src="{{ asset('Assets/HomeBanner.png') }}" alt="New Collection 2018" class="rounded-xl w-11/12 h-max">
        </div>
    </div>

    <div class="container mx-auto p-4 flex flex-col">
        <div class="flex justify-center w-full h-full">
            <div class="w-11/12 flex justify-center space-x-4">
                <div class="flex flex-wrap -mx-4">
                    @foreach($videos as $video)
                        @if($video->VideoType === 'Videos')
                        <div class="w-full md:w-1/2 lg:w-1/4 px-4 mb-8">
                            <div class="videocontainer bg-white rounded-lg overflow-hidden h-full hover:bg-gray-300 transition duration-300">
                                <div class="relative overflow-hidden w-full h-50 sm:h-50 md:h-44 lg:h-32 xl:h-44 rounded-lg">
                                    <img src="{{$video->VideoImage}}" alt="{{ $video->VideoImage }}" class="w-full h-full object-cover">
                                    <div class="w-full h-full absolute inset-0 flex items-center justify-center bg-black bg-opacity-0 hover:bg-opacity-50 transition duration-300">
                                        <div class="flex items-center justify-center w-full h-full text-white text-lg font-bold opacity-0 hover:opacity-100">Watch Now</div>
                                    </div>
                                </div>
                                <div class="flex flex-row p-2 pt-3">
                                    <div class="mt-1 overflow-hidden rounded-full h-10 w-10 flex-shrink-0">
                                        @if($video->user->ProfileImage)
                                            <img src="{{$video->user->ProfileImage}}" alt="{{ $video->VideoImage }}" class="h-full object-cover w-full rounded-full">
                                        @else
                                            <img src="{{asset('Assets/DefaultProfile.png')}}" alt="{{ $video->VideoImage }}" class="h-full object-cover w-full rounded-full">
                                        @endif
                                    </div>
                                    <div class="pl-2 flex-1 max-w-full">
                                        <h2 class="text-base font-bold whitespace-nowrap overflow-hidden text-ellipsis p-0 m-0"><span>{{ Str::words($video->Title, 6, ' ...') }}</span></h2>
                                        <p class="text-sm text-gray-600">{{ $video->user->Name }}</p>
                                        <span class="text-sm text-gray-600">{{ $video->Views }} Views</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="container mx-auto p-0 flex flex-col">
        <div class="flex justify-center w-full h-full">
            <div class="w-11/12 flex justify-center h-[27rem]" style="background-image: url('Assets/PopularCategories.jpg'); background-size: cover; background-position: center; aspect-ratio: 3 / 1;">
                <div class="flex pb-4">
                    <div class="flex-none bg-white rounded-lg shadow-lg p-4 mx-2">
                        <img src="/path/to/your/product1.png" alt="Product 1" class="w-full h-20 object-cover rounded-lg mb-2">
                        <h2 class="text-lg font-bold">Xiao Mini Figure</h2>
                        <p class="text-sm text-gray-600">Genshin Impact</p>
                        <p class="text-orange-500 font-bold">Rp 500.000</p>
                    </div>
                    <div class="flex-none bg-white rounded-lg shadow-lg p-4 mx-2">
                        <img src="/path/to/your/product2.png" alt="Product 2" class="w-full h-20 object-cover rounded-lg mb-2">
                        <h2 class="text-lg font-bold">Hutao Figurine</h2>
                        <p class="text-sm text-gray-600">Genshin Impact</p>
                        <p class="text-orange-500 font-bold">Rp 550.000</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <script src="{{ asset('js/home.js') }}"></script>
@endpush
