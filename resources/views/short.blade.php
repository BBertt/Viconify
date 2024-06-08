@extends('components.layout')
@section('title', 'Short')

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
    <div class="bg-gray-100 flex justify-center items-center min-h-screen">
        <div class="w-full h-full max-w-md mx-auto ">
            <div id="videosWrapper" class="relative">
                <!-- Redirect to short page for the first video -->
                @if ($videoId)
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden mb-6 video-container" data-video-id="{{ $videoId->VideoID }}">
                        <div class="relative">
                            <video class="w-full object-cover" controls muted autoplay loop style="height: 40rem" id="video-{{ $videoId->VideoID }}">
                                <source src="{{ asset($videoId->VideoLinkEmbedded) }}" type="video/mp4">
                            </video>
                            <div class="absolute bottom-16 left-0 w-full text-white p-4" style="background: linear-gradient(to bottom, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.2) 50%, rgba(0, 0, 0, 0.2) 50%, rgba(0, 0, 0, 0));">
                                <div class="relative">
                                    <h2 class="text-lg font-bold truncate" id="title-{{ $videoId->VideoID }}">{{ $videoId->Title }}</h2>
                                    <p class="text-sm truncate" id="desc-{{ $videoId->VideoID }}">{{ $videoId->Description }}</p>
                                    <button class="text-blue-500 mt-2" onclick="toggleDescription({{ $videoId->VideoID }})" id="toggle-btn-{{ $videoId->VideoID }}">Show More</button>
                                    <div class="absolute top-0 right-2 flex space-x-3">
                                        <button class="focus:outline-none" onclick="likeVideo({{ $videoId->VideoID }})">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                                <path fill="none" d="M0 0h24v24H0z"/>
                                                <path fill="currentColor" d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                                            </svg>
                                        </button>
                                        <button class="focus:outline-none" onclick="dislikeVideo({{ $videoId->VideoID }})">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                                <path fill="none" d="M0 0h24v24H0z"/>
                                                <path fill="currentColor" d="M15 3H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h6v4c0 .55.45 1 1 1h2c.83 0 1.54-.5 1.84-1.22l3.85-8.5c.09-.22.14-.45.14-.7V5c0-1.1-.9-2-2-2zm-1 12H5V5h9v10zm4 0h-1V5h1v10z"/>
                                            </svg>
                                        </button>
                                        <button class="focus:outline-none" onclick="shareVideo({{ $videoId->VideoID }})">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                                <path fill="none" d="M0 0h24v24H0z"/>
                                                <path fill="currentColor" d="M18 16.08c-.76 0-1.44.3-1.96.77l-7.1-4.22a2.98 2.98 0 000-1.24l7.1-4.22A2.99 2.99 0 0018 7.91c1.66 0 3-1.34 3-3s-1.34-3-3-3-3 1.34-3 3c0 .24.03.47.08.69l-7.1 4.22A2.99 2.99 0 006 8.09c-1.66 0-3 1.34-3 3s1.34 3 3 3c.76 0 1.44-.3 1.96-.77l7.1 4.22c-.05.22-.08.45-.08.69 0 1.66 1.34 3 3 3s3-1.34 3-3-1.34-3-3-3z"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                @foreach($videos as $video)
                    @if ($video->VideoType ==='Shorts')
                        <div class="bg-white rounded-lg shadow-lg overflow-hidden mb-6 video-container" data-video-id="{{ $video->VideoID }}">
                            <div class="relative">
                                <video class="w-full object-cover" controls muted autoplay loop style="height: 40rem" id="video-{{ $video->VideoID }}">
                                    <source src="{{ asset($video->VideoLinkEmbedded) }}" type="video/mp4">
                                </video>
                                <div class="absolute bottom-16 left-0 w-full text-white p-4" style="background: linear-gradient(to bottom, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.2) 50%, rgba(0, 0, 0, 0.2) 50%, rgba(0, 0, 0, 0));">
                                    <div class="relative">
                                        <h2 class="text-lg font-bold truncate" id="title-{{ $video->VideoID }}">{{ $video->Title }}</h2>
                                        <p class="text-sm truncate" id="desc-{{ $video->VideoID }}">{{ $video->Description }}</p>
                                        <button class="text-blue-500 mt-2" onclick="toggleDescription({{ $video->VideoID }})" id="toggle-btn-{{ $video->VideoID }}">Show More</button>
                                        <div class="absolute top-0 right-2 flex space-x-3">
                                            <button class="focus:outline-none" onclick="likeVideo({{ $video->VideoID }})">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                                    <path fill="none" d="M0 0h24v24H0z"/>
                                                    <path fill="currentColor" d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                                                </svg>
                                            </button>
                                            <button class="focus:outline-none" onclick="dislikeVideo({{ $video->VideoID }})">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                                    <path fill="none" d="M0 0h24v24H0z"/>
                                                    <path fill="currentColor" d="M15 3H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h6v4c0 .55.45 1 1 1h2c.83 0 1.54-.5 1.84-1.22l3.85-8.5c.09-.22.14-.45.14-.7V5c0-1.1-.9-2-2-2zm-1 12H5V5h9v10zm4 0h-1V5h1v10z"/>
                                                </svg>
                                            </button>
                                            <button class="focus:outline-none" onclick="shareVideo({{ $video->VideoID }})">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                                    <path fill="none" d="M0 0h24v24H0z"/>
                                                    <path fill="currentColor" d="M18 16.08c-.76 0-1.44.3-1.96.77l-7.1-4.22a2.98 2.98 0 000-1.24l7.1-4.22A2.99 2.99 0 0018 7.91c1.66 0 3-1.34 3-3s-1.34-3-3-3-3 1.34-3 3c0 .24.03.47.08.69l-7.1 4.22A2.99 2.99 0 006 8.09c-1.66 0-3 1.34-3 3s1.34 3 3 3c.76 0 1.44-.3 1.96-.77l7.1 4.22c-.05.22-.08.45-.08.69 0 1.66 1.34 3 3 3s3-1.34 3-3-1.34-3-3-3z"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endif
                @endforeach
            </div>
            <button id="nextVideoButton" class="absolute bottom-4 right-4 bg-slate-300 text-white px-3 py-2 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                    <path fill="none" d="M0 0h24v24H0z"/>
                    <path fill="currentColor" d="M12 16l-6-6h12z"/>
                </svg>
            </button>
        </div>
    </div>

    <script>
        let currentVideoIndex = 0;
        const videoContainers = document.querySelectorAll('.video-container');
        const nextVideoButton = document.getElementById('nextVideoButton');

        function showVideo(index) {
            videoContainers.forEach((container, idx) => {
                container.style.display = idx === index ? 'block' : 'none';
            });
        }

        nextVideoButton.addEventListener('click', () => {
            currentVideoIndex = (currentVideoIndex + 1) % videoContainers.length;
            showVideo(currentVideoIndex);
        });

        // Initial display setup
        showVideo(currentVideoIndex);

        function handleScroll() {
            const scrollThreshold = 50; // Adjust this value as needed
            const videoHeight = videoContainers[0].offsetHeight;
            const scrollPosition = window.scrollY + window.innerHeight;

            if (scrollPosition > videoHeight + scrollThreshold) {
                currentVideoIndex = (currentVideoIndex + 1) % videoContainers.length;
                showVideo(currentVideoIndex);
                window.scrollTo(0, 0); // Scroll back to the top of the page
            }
        }

        window.addEventListener('scroll', handleScroll);

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

        function toggleLike(button) {
            var svg = button.querySelector('svg');
            svg.classList.toggle('liked');
        }

        function toggleDescription(videoID) {
            var desc = document.getElementById('desc-' + videoID);
            var btn = document.getElementById('toggle-btn-' + videoID);
            if (btn.textContent === 'Show More') {
                desc.classList.remove('truncate');
                btn.textContent = 'Show Less';
            } else {
                desc.classList.add('truncate');
                btn.textContent = 'Show More';
            }
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
