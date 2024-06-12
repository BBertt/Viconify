@extends('components.layout')

@section('title', 'User Page')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white p-6 rounded-lg shadow-md mb-8">
            <h1 class="text-2xl font-bold mb-4">User Profile</h1>
            <div class="flex items-center mb-4">
                <img src="{{ asset($user->ProfileImage) }}" alt="{{ $user->Name }}" class="w-24 h-24 rounded-full mr-4">
                <div>
                    <h2 class="text-lg font-bold">{{ $user->Name }}</h2>
                    <p class="text-gray-700">{{ $user->StoreName }}</p>
                    <p class="text-gray-500">{{ $user->StoreDescription }}</p>
                </div>
            </div>

            <div class="mb-8">
                <h2 class="text-xl font-bold mb-4">Videos</h2>
                <div class="container mx-auto p-4 flex flex-col">
                    <div class="flex justify-center w-full h-full">
                        <div class="w-11/12 flex justify-center space-x-4">
                            <div class="flex flex-wrap -mx-4">
                                @foreach ($videos as $video)
                                    @if($video->VideoType === 'Videos')
                                        <div class="w-full md:w-1/2 lg:w-1/4 px-4 mb-8">
                                            <div class="videocontainer bg-white rounded-lg overflow-hidden h-full hover:bg-gray-300 transition duration-300">
                                                <a href="{{ route('videos.show', $video->VideoID)}}">
                                                    <div class="relative overflow-hidden w-full h-50 sm:h-50 md:h-44 lg:h-32 xl:h-44 rounded-lg">
                                                        <img src="{{ asset($video->VideoImage) }}" alt="{{ $video->Title }}" class="w-full h-full object-cover">
                                                        <div class="w-full h-full absolute inset-0 flex items-center justify-center bg-black bg-opacity-0 hover:bg-opacity-50 transition duration-300">
                                                            <div class="flex items-center justify-center w-full h-full text-white text-lg font-bold opacity-0 hover:opacity-100">Watch Now</div>
                                                        </div>
                                                    </div>
                                                    <div class="flex flex-row p-2 pt-3">
                                                        <div class="mt-1 overflow-hidden rounded-full h-10 w-10 flex-shrink-0">
                                                            <img src="{{ asset($video->user->ProfileImage) }}" alt="{{ $video->user->Name }}" class="h-full object-cover w-full rounded-full">
                                                        </div>
                                                        <div class="pl-2 flex-1 max-w-full">
                                                            <h2 class="text-base font-bold whitespace-nowrap overflow-hidden text-ellipsis p-0 m-0"><span>{{ Str::limit($video->Title, 32, ' ...') }}</span></h2>
                                                            <p class="text-sm text-gray-600">{{ $video->user->Name }}</p>
                                                            <span class="text-sm text-gray-600">{{ $video->Views }} views</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-8">
                <h2 class="text-xl font-bold mb-4">Shorts</h2>
                <div class="container mx-auto p-4 flex flex-col">
                    <div class="flex justify-center w-full h-full">
                        <div class="w-11/12 flex justify-center space-x-4">
                            <div class="container max-w-screen-2xl">
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-4 shorts-container">
                                    @foreach ($videos as $video)
                                        @if($video->VideoType === 'Shorts')
                                            <a href="{{ route('shorts.showShortsById', $video->VideoID) }}" class="short-item relative bg-gray-200 rounded-lg overflow-hidden h-96 m-2 transform transition-transform duration-300 hover:scale-110 hover:shadow-lg hover:bg-[#f0f0f0]">
                                                <img src="{{ asset($video->VideoImage) }}" alt="{{ $video->Title }}" class="w-full h-full object-cover">
                                                <div class="hover-content absolute inset-0 p-4 flex flex-col justify-end opacity-0 transition-opacity duration-300 hover:opacity-100">
                                                    <div class="flex">
                                                        <div class="mt-1 overflow-hidden rounded-full h-10 w-10 flex-shrink-0">
                                                            <img src="{{ asset($video->user->ProfileImage) }}" alt="{{ $video->user->Name }}" class="h-full object-cover w-full rounded-full">
                                                        </div>
                                                        <div class="pl-2 flex-1 max-w-full">
                                                            <h2 class="text-base text-gray-100 font-bold whitespace-nowrap overflow-hidden text-ellipsis p-0 m-0"><span>{{ Str::limit($video->Title, 12, ' ...') }}</span></h2>
                                                            <p class="text-sm text-gray-300">{{ $video->user->Name }}</p>
                                                            <span class="text-sm text-gray-300">{{ $video->Views }} views</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <h2 class="text-xl font-bold mb-4">Products</h2>
                <div class="container mx-auto p-4 flex flex-col">
                    <div class="flex justify-center w-full h-full">
                        <div class="w-11/12 flex justify-center space-x-4">
                            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                                @foreach ($products as $product)
                                    <div class="bg-white p-4 rounded-lg shadow-md">
                                        <a href="{{ route('shop.show', $product) }}" class="product-link block">
                                            @if ($product->pictures->isNotEmpty())
                                                <div class="product-image h-60 w-full mb-4 rounded-lg">
                                                    <img src="{{ asset('storage/' . $product->pictures->first()->PictureData) }}" alt="{{ $product->ProductName }}" class="h-60 w-full object-cover image1">
                                                    @if ($product->pictures->count() > 1)
                                                        <img src="{{ asset('storage/' . $product->pictures->skip(1)->first()->PictureData) }}" alt="{{ $product->ProductName }}" class="h-60 w-full object-cover image2">
                                                    @else
                                                        <img src="{{ asset('storage/' . $product->pictures->first()->PictureData) }}" alt="{{ $product->ProductName }}" class="h-60 w-full object-cover image2">
                                                    @endif
                                                </div>
                                            @endif
                                            <h2 class="text-lg font-bold">{{ Str::limit($product->ProductName, 30, '...') }}</h2>
                                            <div class="flex items-center mt-2">
                                                <img src="{{ asset($product->user->ProfileImage) }}" alt="{{ $product->user->Name }}" class="w-10 h-10 rounded-full mr-4">
                                                <p class="text-gray-500">{{ $product->user->StoreName }}</p>
                                            </div>
                                            <p class="text-red-500 font-bold mt-2">Rp {{ number_format($product->ProductPrice, 0, ',', '.') }}</p>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @push('scripts')
        <link rel="stylesheet" href="{{ asset('css/shop/layout.css') }}">
    @endpush
    
@endsection
