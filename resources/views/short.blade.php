@extends('layout')
@section('title', 'Short')
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
    </header>
    <body class="bg-gray-100 flex justify-center items-center min-h-screen">
        <div class="w-full h-full max-w-md mx-auto">
            @foreach($videos as $video)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden mb-6">
                    <div class="relative">
                        <video class="w-full object-cover" controls muted loop style="height: 40rem" id="video-{{ $video->VideoID }}">
                            <source src="{{ $video->VideoLinkEmbedded }}" type="video/mp4">
                        </video>
                        <div class="absolute bottom-16 left-0 w-full bg-black bg-opacity-50 text-white p-4" style="background: linear-gradient(to bottom, rgba(255, 255, 255, 0), rgba(0, 0, 0, 0));">
                            <h2 class="text-lg font-bold truncate" id="title-{{ $video->VideoID }}">{{ $video->Title }}</h2>
                            <p class="text-sm truncate" id="desc-{{ $video->VideoID }}">{{ $video->Description }}</p>
                            <button class="text-blue-500 focus:outline-none hidden" id="more-btn-{{ $video->VideoID }}" onclick="toggleText('{{ $video->VideoID }}')">More</button>
                        </div>
                    </div>
                    <div class="p-4 flex justify-end space-x-3">
                        <button class="focus:outline-none" onclick="toggleLike(this)">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-200" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 21l-8-8c-2-2 0-6 3-6 1.6 0 3.3.6 4 2 0.7-1.4 2.4-2 4-2 3 0 5 4 3 6l-8 8z"/>
                            </svg>
                        </button>
                        <button class="focus:outline-none" onclick="dislikeVideo({{ $video->VideoID }})">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l6-6m0 0l-6-6m6 6H3"/>
                            </svg>
                        </button>
                        <button class="focus:outline-none" onclick="shareVideo({{ $video->VideoID }})">
                            <img src="{{ asset('path-to-your-uploaded-image/Screenshot 2024-06-02 at 21.25.48.png') }}" class="h-6 w-6 text-gray-200">
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                @foreach($videos as $video)
                    var title = document.getElementById('title-{{ $video->VideoID }}');
                    var desc = document.getElementById('desc-{{ $video->VideoID }}');
                    var moreBtn = document.getElementById('more-btn-{{ $video->VideoID }}');
    
                    if (title.scrollWidth > title.clientWidth || desc.scrollWidth > desc.clientWidth) {
                        moreBtn.classList.remove('hidden');
                    }
    
                    // Set up the timestamp display
                    var video = document.getElementById('video-{{ $video->VideoID }}');
                    var timestamp = document.getElementById('timestamp-{{ $video->VideoID }}');
                    video.addEventListener('timeupdate', function() {
                        var minutes = Math.floor(video.currentTime / 60);
                        var seconds = Math.floor(video.currentTime % 60);
                        timestamp.textContent = minutes + ':' + (seconds < 10 ? '0' : '') + seconds;
                    });
                @endforeach
            });
    
            function toggleText(videoID) {
                var title = document.getElementById('title-' + videoID);
                var desc = document.getElementById('desc-' + videoID);
                var moreBtn = document.getElementById('more-btn-' + videoID);
    
                if (title.classList.contains('truncate') || desc.classList.contains('truncate')) {
                    title.classList.remove('truncate');
                    desc.classList.remove('truncate');
                    moreBtn.textContent = 'Less';
                } else {
                    title.classList.add('truncate');
                    desc.classList.add('truncate');
                    moreBtn.textContent = 'More';
                }
            }
    
            function toggleLike(button) {
                var svg = button.querySelector('svg');
                svg.classList.toggle('liked');
            }
    
            function likeVideo(videoID) {
                fetch(`/videos/${videoID}/like`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                }).then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Update UI or give feedback to the user
                    }
                });
            }
    
            function dislikeVideo(videoID) {
                fetch(`/videos/${videoID}/dislike`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                }).then(response => response.json())
                  .then(data => {
                      if (data.success) {
                          // Update UI or give feedback to the user
                      }
                  });
            }
    
            function shareVideo(videoID) {
                // Implement the share functionality
            }
        </script>
@endsection

@push('scripts')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <script src="{{ asset('js/home.js') }}"></script>
@endpush
