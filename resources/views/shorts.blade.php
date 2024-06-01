@extends('layout')
@section('title', isset($video) ? $video->Title : 'Short Videos')
@section('content')
<body class="bg-gray-100 text-gray-900">

    <header class="bg-[#E6F5FF] text-black p-4 flex flex-col items-center w-full top-0 left-0 z-10">
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
                <div id="recommendations" class="absolute mt-1 bg-white text-black rounded-md shadow-lg w-full max-h-60 overflow-y-auto hidden">
                    <!-- Recommendations will be dynamically added here -->
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

        
    </header>

    @if(isset($message))
        <h1>{{ $message }}</h1>
    @elseif(isset($video))
        <h1>{{ $video->Title }}</h1>
        <p>{{ $video->Description }}</p>
        <div class="container mx-auto mt-2">
            <div class="relative overflow-hidden max-w-lg mx-auto" style="height: calc(100vh - 96px);">
                <div class="absolute top-0 left-0 w-full h-full">
                    <video id="videoElement" autoplay muted loop class="w-full h-full object-cover rounded-lg" onclick="togglePlayPause()">
                        <source src="{{ $video->VideoLinkEmbedded }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <div id="progressContainer" class="absolute bottom-0 left-0 w-full h-1 bg-gray-300 rounded-b-lg">
                        <div id="progressBar" class="h-2 bg-blue-600"></div>
                    </div>
                </div>
            </div>
            <div class="flex justify-between mt-4">
                <form action="{{ route('shorts.like', $video->VideoID) }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Like ({{ $video->Like }})</button>
                </form>
                <form action="{{ route('shorts.dislike', $video->VideoID) }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Dislike ({{ $video->Dislike }})</button>
                </form>
            </div>
        </div>

        <script>
            const video = document.getElementById('videoElement');
            const progressBar = document.getElementById('progressBar');

            function togglePlayPause() {
                if (video.paused) {
                    video.play();
                } else {
                    video.pause();
                }
            }

            video.addEventListener('timeupdate', updateProgress);

            function updateProgress() {
                const percentage = (video.currentTime / video.duration) * 100;
                progressBar.style.width = percentage + '%';
            }
        </script>
    @endif

</body>

    
    
@endsection

@push('scripts')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <script src="{{ asset('js/home.js') }}"></script>
@endpush
