@extends('layout')

@section('title', 'Profile')

@section('content')
<header class="bg-[#E6F5FF] text-black p-4 flex flex-col items-center">
    <div class="flex items-center justify-between w-full">
        <div class="flex items-center space-x-4">
            <a href= {{route('HomePage')}}>
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </a>
            <span class="text-black font-bold text-xl">Profile</span>
        </div>
</header>
<div class="container mx-auto p-4">
    <h2 class="text-2xl font-bold mb-4">Profile</h2>
    @if(session('success'))
        <div class="bg-green-500 text-white p-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label for="profile_image" class="block text-gray-700">Profile Image</label>
            <input type="file" name="profile_image" id="profile_image" class="block w-full mt-1">
            <img src="{{ asset($user->ProfileImage) }}" alt="{{ $user->ProfileImage }}" class="w-20 h-20 rounded-full mt-2">
        </div>

        <div class="mb-4">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update Profile</button>
        </div>
    </form>
</div>
@endsection
