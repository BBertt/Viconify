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

<div class="w-full h-[94%] flex">
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
        <div class="tabs flex mb-4">
            <button class="tab-link bg-blue-500 text-white font-bold py-2 px-4 rounded" onclick="showTab('videos')">Videos</button>
            <button class="tab-link bg-white text-black font-bold py-2 px-4 rounded border" onclick="showTab('products')">Product</button>
            <button class="tab-link bg-white text-black font-bold py-2 px-4 rounded border" onclick="showTab('posts')">Post</button>
            <button class="tab-link bg-white text-black font-bold py-2 px-4 rounded border" onclick="showTab('addVideos')">Add Videos</button>
        </div>

        <div id="videos" class="tab-content">
            <div class="w-full">
                @foreach ($videos as $video)
                    <div class="flex items-center p-4 border rounded mt-2 mb-2">
                        <div class="overflow-hidden h-28 w-48 rounded">
                            <img src="{{ asset($video->VideoImage) }}" alt="Video Image" class="w-full h-full object-cover">
                        </div>
                    </div>
                @endforeach
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
