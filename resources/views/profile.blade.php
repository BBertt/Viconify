@extends('components.layout')

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

  <div class="flex justify-center items-center h-[94%]">
    <div class="profile-container mx-auto p-4 flex flex-col gap-4 w-2/6 border rounded-xl">
        @if (session('success'))
          <div class="alert alert-success bg-green-500 text-white p-2 rounded mb-4">
            {{ session('success') }}
          </div>
        @endif

        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-2">
          @csrf

          <div class="profile-image-container flex items-center">
            <label for="profile_image" class="block text-gray-700 mr-2">Profile Image</label>
            <input type="file" name="profile_image" id="profile_image" class="block w-full">
            <img src="{{ asset($user->ProfileImage) }}" alt="{{ $user->ProfileImage }}" class="w-20 h-20 rounded-full ml-2">
          </div>

          <div class="profile-input-container flex flex-col gap-1">
            <label for="name" class="text-gray-700">Name</label>
            <input type="text" name="name" id="name" value="{{ $user->Name }}" class="block w-full border rounded px-2 py-1">
          </div>

          <div class="profile-input-container flex flex-col gap-1">
            <label for="email" class="text-gray-700">Email</label>
            <input type="email" name="email" id="email" value="{{ $user->email }}" class="block w-full border rounded px-2 py-1">
          </div>

          <div class="profile-input-container flex flex-col gap-1">
            <label for="address" class="text-gray-700">Address</label>
            <input type="text" name="address" id="address" value="{{ $user->Address }}" class="block w-full border rounded px-2 py-1">
          </div>

          <div class="profile-input-container flex flex-col gap-1">
            <label for="phone_number" class="text-gray-700">Phone Number</label>
            <input type="text" name="phone_number" id="phone_number" value="{{ $user->PhoneNumber }}" class="block w-full border rounded px-2 py-1">
          </div>

          <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update Profile</button>
        </form>
      </div>
  </div>
@endsection
