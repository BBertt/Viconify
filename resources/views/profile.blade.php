@extends('components.layout')

@section('title', 'Profile')

@section('content')
<header class="bg-[#E6F5FF] text-black p-4 flex flex-col items-center">
    <div class="flex items-center justify-between w-full">
        <div class="flex items-center space-x-4">
            <a href="{{ route('HomePage') }}">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </a>
            <span class="text-black font-bold text-xl">Profile</span>
        </div>
    </div>
</header>

<div class="w-full h-[94%] flex" style="background-color: #E6F5FF;">
    <div class="w-1/3 p-4">
        <div class="profile-container p-4 border rounded-xl bg-white">
            @if (session('success'))
                <div class="alert alert-success bg-green-500 text-white p-2 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <div class="profile-image-container flex items-center space-x-4">
                    <label for="profile_image" class="block text-gray-700 font-semibold">Profile Image</label>
                    <input type="file" name="profile_image" id="profile_image" class="block w-full text-sm text-gray-500 border rounded px-2 py-1">
                    <img src="{{ asset($user->ProfileImage) }}" alt="{{ $user->ProfileImage }}" class="w-16 h-16 rounded-full ml-2 object-cover">
                </div>

                <div class="space-y-2">
                    <label for="name" class="block text-gray-700 font-semibold">Name</label>
                    <input type="text" name="name" id="name" value="{{ $user->Name }}" class="block w-full border rounded px-3 py-2 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="space-y-2">
                    <label for="email" class="block text-gray-700 font-semibold">Email</label>
                    <input type="email" name="email" id="email" value="{{ $user->email }}" class="block w-full border rounded px-3 py-2 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="space-y-2">
                    <label for="address" class="block text-gray-700 font-semibold">Address</label>
                    <input type="text" name="address" id="address" value="{{ $user->Address }}" class="block w-full border rounded px-3 py-2 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="space-y-2">
                    <label for="phone_number" class="block text-gray-700 font-semibold">Phone Number</label>
                    <input type="text" name="phone_number" id="phone_number" value="{{ $user->PhoneNumber }}" class="block w-full border rounded px-3 py-2 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <button type="submit" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Update Profile</button>
            </form>
        </div>
    </div>

    <div class="w-2/3 p-4">
        <div class="tabs flex justify-around mb-4">
            <button class="tab-link bg-blue-500 text-white font-bold py-2 px-4 rounded" onclick="showTab('videos')">Videos</button>
            <button class="tab-link bg-white text-black font-bold py-2 px-4 rounded border" onclick="showTab('products')">Product</button>
            <button class="tab-link bg-white text-black font-bold py-2 px-4 rounded border" onclick="showTab('posts')">Post</button>
            <button class="tab-link bg-white text-black font-bold py-2 px-4 rounded border" onclick="showTab('addVideos')">Add Videos</button>
        </div>

        <div id="videos" class="tab-content">
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
        </div>

        <div id="products" class="tab-content hidden">
            <!-- Product content goes here -->
            @foreach ($products as $product)
                <div class="product-item p-4 border rounded-lg mb-4 flex items-center">
                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="w-20 h-20 rounded-lg object-cover">
                    <div class="ml-4">
                        <h3 class="text-lg font-bold">{{ $product->name }}</h3>
                        <p class="text-sm text-gray-600">{{ $product->price }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <div id="posts" class="tab-content hidden">
            <!-- Post content goes here -->
            @foreach ($posts as $post)
                <div class="post-item p-4 border rounded-lg mb-4">
                    <h3 class="text-lg font-bold">{{ $post->title }}</h3>
                    <p class="text-sm text-gray-600">{{ $post->content }}</p>
                </div>
            @endforeach
        </div>

        
    </div>
</div>

<script>
    function showTab(tabId) {
        document.querySelectorAll('.tab-content').forEach(function(tabContent) {
            tabContent.classList.add('hidden');
        });
        document.getElementById(tabId).classList.remove('hidden');

        document.querySelectorAll('.tab-link').forEach(function(tabLink) {
            tabLink.classList.remove('bg-blue-500', 'text-white');
            tabLink.classList.add('bg-white', 'text-black', 'border');
        });

        event.target.classList.add('bg-blue-500', 'text-white');
        event.target.classList.remove('bg-white', 'text-black', 'border');
    }
</script>
@endsection
