@extends('components.layout')
@section('title', 'Home')

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

@section('suggestion')
    <div class="mt-2 w-full relative overflow-x-hidden">
        <button id="scrollLeft" class="carousel-control-prev-icon absolute left-0 top-0 bottom-0 z-10 bg-white text-black px-3 py-1 rounded-full cursor-pointer hover:bg-gray-400 hidden"> </button>
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
        <button id="scrollRight" class="carousel-control-next-icon absolute right-0 top-0 bottom-0 z-10 bg-white text-black px-3 py-1 rounded-full cursor-pointer hover:bg-gray-400"></button>
    </div>
@endsection

@section('content')
    <body class="text-gray-900">
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
                <img src="{{ asset('Assets/HomeBanner1.jpg') }}" alt="New Collection 2018" class="rounded-xl w-11/12 h-max">
            </div>
        </div>

        <div class="container mx-auto p-4 flex flex-col">
            <div class="flex justify-center w-full h-full">
                <div class="w-11/12 flex justify-center space-x-4">
                    <div class="flex flex-wrap -mx-4">
                        @php
                        $videoCount = 0;
                        $dbCount = 0;
                        @endphp
                        @for ($i = $videoCount; $i < count($videos); $i++)
                            @if($videos[$i]->VideoType === 'Videos' && $videoCount < 4)
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

        <div class="container mx-auto p-4 pt-0 flex flex-col">
            <div class="flex justify-center w-full h-full">
                <div class="w-11/12 flex justify-center space-x-4">
                    <div class="container mx-auto p-0 flex flex-col">
                        <div class="background-div">
                            <img src="Assets/PopularCategories.jpg" alt="Popular Categories" class="rounded-lg">
                            <div class="overlay-content p-14">
                                <div class="container mx-auto px-4 py-4">

                                    <div class="grid grid-cols-6 gap-6">
                                        @php $ItemCount = 0; @endphp
                                        @for ($i = $ItemCount; $i < count($products); $i++)
                                            @if ($ItemCount<6)
                                            <a href="{{ route('shop.show', $products[$i]) }}" class="product-link">
                                                <div class="bg-white rounded-md shadow-md">
                                                    @if ($products[$i]->pictures->isNotEmpty())
                                                        <div class="product-image relative overflow-hidden w-full h-50 sm:h-15 md:h-20 lg:h-32 xl:h-44 rounded-t-md">
                                                            <img src="{{ asset('storage/' . $products[$i]->pictures->first()->PictureData) }}" alt="{{ $products[$i]->ProductName }}" class="h-full w-full object-cover image1">
                                                            @if ($products[$i]->pictures->count() > 1)
                                                                <img src="{{ asset('storage/' . $products[$i]->pictures->skip(1)->first()->PictureData) }}" alt="{{ $products[$i]->ProductName }}" class="h-full w-full object-cover image2">
                                                            @else
                                                                <img src="{{ asset('storage/' . $products[$i]->pictures->first()->PictureData) }}" alt="{{ $products[$i]->ProductName }}" class="h-full w-full object-cover image2">
                                                            @endif
                                                        </div>
                                                    @endif
                                                    <div class="flex w-full overflow-hidden">
                                                        <div class="mt-1 ml-1 overflow-hidden rounded-full h-10 w-10 flex-shrink-0">
                                                            @if($videos[$i]->user->ProfileImage)
                                                                <img src="{{$videos[$i]->user->ProfileImage}}" alt="{{ $videos[$i]->VideoImage }}" class="h-full object-cover w-full rounded-full">
                                                            @else
                                                                <img src="{{asset('Assets/DefaultProfile.png')}}" alt="{{ $videos[$i]->VideoImage }}" class="h-full object-cover w-full rounded-full">
                                                            @endif
                                                        </div>
                                                        <div class="pl-2 flex-1 max-w-full pr-2">
                                                            <h2 class="text-base whitespace-nowrap font-bold">{{ $products[$i]->ProductName }}</h2>
                                                            <p class="text-sm whitespace-nowrap text-gray-500">{{ $products[$i]->user->Name }}</p>
                                                            <p class="text-sm whitespace-nowrap text-red-500 font-bold">Rp {{ number_format($products[$i]->ProductPrice, 0, ',', '.') }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                            @endif
                                            @php $ItemCount++; @endphp
                                        @endfor
                                    </div>

                                </div>
                            </div>
                        </div>
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
                                    <a href="{{ route('shorts.showShortsById', $video->VideoID) }}" class="short-item relative bg-gray-200 rounded-lg overflow-hidden h-96 m-2 transform transition-transform duration-300 hover:scale-110 hover:shadow-lg hover:bg-[#f0f0f0]">
                                        <img src="{{ asset($video->VideoImage) }}" alt="{{ $video->Title }}" class="w-full h-full object-cover">
                                        <div class="hover-content absolute inset-0 p-4 flex flex-col justify-end opacity-0 transition-opacity duration-300 hover:opacity-100">
                                            <div class="flex">
                                                <div class="mt-1 overflow-hidden rounded-full h-10 w-10 flex-shrink-0">
                                                    @if($video->user->ProfileImage)
                                                        <img src="{{$video->user->ProfileImage}}" alt="{{ $video->VideoImage }}" class="h-full object-cover w-full rounded-full">
                                                    @else
                                                        <img src="{{asset('Assets/DefaultProfile.png')}}" alt="{{ $video->VideoImage }}" class="h-full object-cover w-full rounded-full">
                                                    @endif
                                                </div>
                                                <div class="pl-2 flex-1 max-w-full">
                                                    <h2 class="text-base text-gray-100 font-bold whitespace-nowrap overflow-hidden text-ellipsis p-0 m-0"><span>{{ Str::limit($video->Title, 12, ' ...') }}</span></h2>
                                                    <p class="text-sm text-gray-300">{{ $video->user->Name }}</p>
                                                    <span class="text-sm text-gray-300">{{ $video->Views }} views</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
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
