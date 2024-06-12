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

@section('content')
    <div class="container w-4/12 mx-auto mt-9 p-0 flex flex-col">
        @foreach ($posts as $post)
            <div class="post-item p-4 border rounded-lg mb-4">
                <div class="flex flex-row">
                    <div class="mt-1 overflow-hidden rounded-full h-10 w-10 flex-shrink-0">
                        @if($post->user->ProfileImage)
                            <img src="{{$post->user->ProfileImage}}" alt="{{ $post->user->ProfileImage }}" class="h-full object-cover w-full rounded-full">
                        @else
                            <img src="{{asset('Assets/DefaultProfile.png')}}" alt="{{ $post->user->ProfileImage }}" class="h-full object-cover w-full rounded-full">
                        @endif
                    </div>
                    <div class="h-10 ml-2 flex items-center">
                        <h3 class="text-lg font-bold">{{ $post->user->Name }}</h3>
                    </div>
                </div>
                <h3 class="text-lg font-bold">{{ $post->Title }}</h3>
                <p class="text-sm text-gray-600 mb-2">{{ $post->Description }}</p>
                @if ($post->pictures->isNotEmpty())
                    <div class="relative">
                        <div class="carousel" id="carousel-{{ $post->PostID }}">
                            @foreach ($post->pictures as $index => $picture)
                                <div class="carousel-item {{ $index === 0 ? 'active' : '' }} w-full h-64 overflow-hidden rounded">
                                    <img src="{{ asset($picture->PictureData) }}" alt="Post Image" class="w-full h-full object-cover">
                                </div>
                            @endforeach
                        </div>
                        @if ($post->pictures->count() > 1)
                            <button class="prev absolute top-1/2 left-0 transform -translate-y-1/2 bg-gray-800 text-white px-3 py-1 rounded" onclick="prevSlide({{ $post->PostID }})">❮</button>
                            <button class="next absolute top-1/2 right-0 transform -translate-y-1/2 bg-gray-800 text-white px-3 py-1 rounded" onclick="nextSlide({{ $post->PostID }})">❯</button>
                        @endif
                    </div>
                @endif
                <div class="flex justify-between items-center mt-4">
                    <button class="bg-blue-500 text-white font-bold py-2 px-4 rounded" onclick="openComments({{ $post->PostID }})">View Comments</button>
                </div>
            </div>
        @endforeach
    </div>

    <div id="commentsModal" class="pl-12 fixed inset-0 flex items-end justify-center bg-black bg-opacity-50 hidden" onclick="closeComments()">
        <div class="bg-white p-6 rounded-t-lg shadow-lg w-full sm:w-1/3" onclick="event.stopPropagation()">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold">Comments</h2>
                <button onclick="closeComments()" class="text-gray-600 hover:text-gray-800">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <div id="commentsContent" class="mb-4">
            </div>
            <form id="commentForm" method="POST" class="mt-4">
                @csrf
                <input type="hidden" id="postId" name="post_id">
                <div class="flex">
                    <input type="text" name="comment" id="comment" class="flex-grow border rounded-l px-4 py-2" placeholder="Add a comment..." required>
                    <button type="submit" class="bg-blue-500 text-white font-bold px-4 rounded-r">Post</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <script src="{{ asset('js/home.js') }}"></script>
    <script>
        function openComments(postId) {
            document.getElementById('postId').value = postId;
            document.getElementById('commentsModal').classList.remove('hidden');
            fetchComments(postId);

            const commentForm = document.getElementById('commentForm');
            commentForm.setAttribute('action', `/posts/${postId}/comments`);
        }

        function closeComments() {
            document.getElementById('commentsModal').classList.add('hidden');
        }

        function fetchComments(postId) {
            fetch(`/posts/${postId}`)
                .then(response => response.json())
                .then(data => {
                    const commentsContent = document.getElementById('commentsContent');
                    commentsContent.innerHTML = '';
                    data.comments.forEach(comment => {
                        const commentElement = document.createElement('div');
                        commentElement.className = 'comment-item mb-2';
                        commentElement.innerHTML = `
                            <div class="flex items-center">
                                <img src="${comment.user.ProfileImage ?? 'Assets/DefaultProfile.png'}" alt="Profile Image" class="w-8 h-8 rounded-full mr-2">
                                <div>
                                    <h4 class="font-bold">${comment.user.Name}</h4>
                                    <p class="text-sm text-gray-600">${comment.Comments}</p>
                                </div>
                            </div>
                        `;
                        commentsContent.appendChild(commentElement);
                    });
                })
                .catch(error => console.error('Error fetching comments:', error));
        }

        document.getElementById('commentForm').addEventListener('submit', function(event) {
            event.preventDefault();
            const form = event.target;
            const formData = new FormData(form);
            const postId = formData.get('post_id');

            fetch(form.getAttribute('action'), {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': formData.get('_token'),
                    'Accept': 'application/json',
                },
                body: formData
            }).then(response => response.json())
            .then(data => {
                if (data.success) {
                    fetchComments(postId);
                    form.reset();
                } else {
                    console.error('Error posting comment:', data.message);
                }
            })
            .catch(error => console.error('Error posting comment:', error));
        });

        function showSlide(postId, index) {
            const slides = document.querySelectorAll(`#carousel-${postId} .carousel-item`);
            slides.forEach((slide, i) => {
                slide.classList.toggle('active', i === index);
            });
        }

        function nextSlide(postId) {
            const slides = document.querySelectorAll(`#carousel-${postId} .carousel-item`);
            const activeSlide = Array.from(slides).findIndex(slide => slide.classList.contains('active'));
            const nextIndex = (activeSlide + 1) % slides.length;
            showSlide(postId, nextIndex);
        }

        function prevSlide(postId) {
            const slides = document.querySelectorAll(`#carousel-${postId} .carousel-item`);
            const activeSlide = Array.from(slides).findIndex(slide => slide.classList.contains('active'));
            const prevIndex = (activeSlide - 1 + slides.length) % slides.length;
            showSlide(postId, prevIndex);
        }
    </script>
@endpush
