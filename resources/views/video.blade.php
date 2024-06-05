@extends('layout')
@section('title', 'Video')
@section('content')
<body class="bg-gray-100 text-gray-900">
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
                <a href="{{ route('cart.index') }}">
                    <svg class="text-black h-6 w-6 cursor-pointer" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h18l-2 13H5L3 3zM5 6h14M9 9v6M15 9v6M6 21a1 1 0 100-2 1 1 0 000 2zm12 0a1 1 0 100-2 1 1 0 000 2z" />
                    </svg>
                </a>
                @if(Auth::check())
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white font-bold rounded hover:bg-blue-700">Logout</button>
                    </form>
                    <a href="/profile">
                        <div class="mt-1 overflow-hidden rounded-full h-11 w-11 flex-shrink-0">
                            @if(Auth::user()->ProfileImage)
                                <img src="{{Auth::user()->ProfileImage}}" alt="None" class="h-full object-cover w-full rounded-full">
                            @else
                                <img src="{{asset('Assets/DefaultProfile.png')}}" alt="None" class="h-full object-cover w-full rounded-full">
                            @endif
                        </div>
                    </a>
                @else
                    <a href="{{ route('login') }}" class="text-black">
                        <button class="px-4 py-2 bg-white text-black font-bold rounded border hover:bg-gray-200">Login</button>
                    </a>
                    <a href="{{ route('Register') }}" class="text-black">
                        <button class="px-4 py-2 bg-blue-500 text-white font-bold rounded hover:bg-blue-700">Register</button>
                    </a>
                @endif
            </div>
        </div>

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
    </header>

    <div class="container mx-auto py-4 max-w-screen-2xl px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
            <div class="col-span-1 lg:col-span-3">
                <div class="bg-white shadow rounded-lg overflow-hidden">
                    <video controls class="w-full rounded-lg">
                        <source src="{{ asset($video->VideoLinkEmbedded) }}">
                    </video>
                    <div class="p-4">
                        <h1 class="text-2xl font-bold mb-2">{{ $video->Title }}</h1>
                        <div class="flex items-center space-x-4 mb-4">
                            <img src="{{ $video->user->ProfileImage }}" alt="{{ $video->user->Name }}" class="w-10 h-10 rounded-full">
                            <div class="flex-grow">
                                <h2 class="font-bold">{{ $video->user->Name }}</h2>
                            </div>
                            <div class="flex items-center space-x-4">
                                <div class="flex items-center bg-white text-black px-4 py-2 border border-black rounded-full">
                                    <button class="flex items-center space-x-2">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </button>
                                    <span class="mx-2">|</span>
                                    <button class="flex items-center space-x-2">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 13l-4-4L5 17"></path>
                                        </svg>
                                    </button>
                                </div>
                                <button class="bg-white text-black px-4 py-2 border border-black rounded-full flex items-center space-x-2">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>Share</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="bg-[#C1E5FF] py-4 px-6">
                        <p class="mb-4 font-bold">{{ $video->Views }} Views • {{ $video->created_at->format('d M Y') }}</p>
                        <div id="description-container" class="relative">
                            <p id="description" class="mb-4 overflow-hidden" style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">{{ $video->Description }}</p>
                            <button id="more-button" class="text-black-500 font-bold inline" style="display: none;">...more</button>
                        </div>
                    </div>

                    <div class="container mx-auto mt-9 p-0 flex flex-col">
                        <div class="background-div">
                            <img src="{{ asset('Assets/PopularCategories.jpg') }}" alt="Popular Categories" class="rounded-lg">
                            <div class="overlay-content p-14">
                                <div class="container mx-auto px-4 py-4">
                                    <div class="grid grid-cols-4 gap-6">
                                        @foreach ($products->slice(0, 4) as $product)
                                            <a href="{{ route('shop.show', $product) }}" class="product-link">
                                                <div class="bg-white rounded-md shadow-md">
                                                    @if ($product->pictures->isNotEmpty())
                                                        <div class="product-image relative overflow-hidden w-full h-50 sm:h-15 md:h-20 lg:h-32 xl:h-44 rounded-t-md">
                                                            <img src="{{ asset('storage/' . $product->pictures->first()->PictureData) }}" alt="{{ $product->ProductName }}" class="h-full w-full object-cover">
                                                        </div>
                                                    @endif
                                                    <div class="flex w-full overflow-hidden">
                                                        <div class="mt-1 ml-1 overflow-hidden rounded-full h-10 w-10 flex-shrink-0">
                                                            @if($product->user->ProfileImage)
                                                                <img src="{{ $product->user->ProfileImage }}" alt="{{ $product->user->Name }}" class="h-full object-cover w-full rounded-full">
                                                            @else
                                                                <img src="{{ asset('Assets/DefaultProfile.png') }}" alt="{{ $product->user->Name }}" class="h-full object-cover w-full rounded-full">
                                                            @endif
                                                        </div>
                                                        <div class="pl-2 flex-1 max-w-full pr-2">
                                                            <h2 class="text-base whitespace-nowrap font-bold">{{ $product->ProductName }}</h2>
                                                            <p class="text-sm whitespace-nowrap text-gray-500">{{ $product->user->Name }}</p>
                                                            <p class="text-sm whitespace-nowrap text-red-500 font-bold">Rp {{ number_format($product->ProductPrice, 0, ',', '.') }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Comment Section -->
                    <div class="bg-white p-4 mt-4 rounded-lg">
                        <h2 class="text-xl font-bold mb-4">{{ $video->comments->count() }} Comments</h2>
                        <div class="flex items-center mb-4">
                            <img src="{{ auth()->check() ? asset(auth()->user()->ProfileImage) : '' }}" alt="{{ auth()->check() ? auth()->user()->Name : '' }}" class="w-10 h-10 rounded-full">
                            <textarea class="comment-textarea w-full ml-4 border-b border-gray-300 focus:outline-none focus:border-gray-600" placeholder="Add your comment..."></textarea>
                        </div>

                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-2 text-gray-400">
                                <button class="hover:text-gray-600">
                                    <i class="fas fa-paperclip"></i>
                                </button>
                                <button class="hover:text-gray-600">
                                    <i class="fas fa-smile"></i>
                                </button>
                            </div>
                            <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Comment</button>
                        </div>

                        <!-- Example comment -->
                        <div class="mt-4 mb-4">
                            @foreach ($video->comments as $comment)
                                @if ($comment->CommentParentID === null)
                                    <div class="flex items-start mb-4">
                                        <img src="{{ asset($comment->user->ProfileImage) }}" alt="{{ $comment->user->Name }}" class="w-10 h-10 rounded-full">
                                        <div class="ml-4 bg-white p-3 rounded-lg flex-1">
                                            <div class="flex items-center mb-1">
                                                <span class="font-bold mr-2">{{ $comment->user->Name }}</span>
                                                <span class="text-sm text-gray-500">{{ $comment->created_at->format('d M Y') }}</span>
                                            </div>
                                            <p class="text-gray-800 comment-text">{{ $comment->Comments }}</p>
                                            <div class="flex items-center mt-2">
                                                <button class="like-button flex items-center">
                                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                    </svg>
                                                </button>
                                                <button class="dislike-button flex items-center ml-4">
                                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 13l-4-4L5 17"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <!-- End Comment Section -->
                </div>
            </div>

            <!-- Video suggestions -->
            <div class="col-span-1 lg:col-span-1 mt-4 lg:mt-0">
                <div class="flex flex-col space-y-4 overflow-hidden">
                    @foreach ($videos as $vid)
                        @if ($vid->VideoType === 'Videos' && $vid->VideoID !== $video->VideoID)
                            <a href="{{ route('videos.show', $vid->VideoID) }}">
                                <div class="flex items-start space-x-4">
                                    <img src="{{ asset($vid->VideoImage) }}" alt="{{ $vid->Title }}" class="rounded-lg w-[120px] h-[80px] object-cover">
                                    <div class="w-full">
                                        <h3 class="font-bold line-clamp-2">{{ $vid->Title }}</h3>
                                        <p class="text-gray-600">{{ $vid->Views }} Views • {{ $vid->created_at->format('d M Y') }}</p>
                                    </div>
                                </div>
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const description = document.getElementById('description');
            const moreButton = document.getElementById('more-button');

            // Check if the description text is longer than three lines
            if (description.scrollHeight > description.clientHeight) {
                moreButton.style.display = 'inline';
            }

            moreButton.addEventListener('click', function () {
                if (moreButton.innerText === '...more') {
                    description.style.webkitLineClamp = 'unset';
                    description.style.overflow = 'visible';
                    moreButton.innerText = 'Show less';
                } else {
                    description.style.webkitLineClamp = '3';
                    description.style.overflow = 'hidden';
                    moreButton.innerText = '...more';
                }
            });

            description.addEventListener('scroll', function () {
                if (description.scrollTop + description.clientHeight >= description.scrollHeight) {
                    moreButton.style.display = 'inline';
                } else {
                    moreButton.style.display = 'none';
                }
            });

            document.querySelectorAll('.reply-button').forEach(button => {
                button.addEventListener('click', function () {
                    const commentId = this.getAttribute('data-comment-id');
                    const replyForm = document.getElementById(`reply-form-${commentId}`);
                    replyForm.classList.toggle('hidden');
                });
            });

            document.querySelectorAll('.toggle-replies-button').forEach(button => {
                button.addEventListener('click', function () {
                    const commentId = this.getAttribute('data-comment-id');
                    const repliesDiv = document.getElementById(`replies-${commentId}`);
                    repliesDiv.classList.toggle('hidden');
                });
            });
        });
    </script>
</body>
@endsection

@push('scripts')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <script src="{{ asset('js/home.js') }}"></script>
@endpush
