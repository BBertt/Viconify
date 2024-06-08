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

<div class="w-full flex">
    @if (session('success'))
        <div class="m-5 mb-0 alert alert-success bg-green-500 text-white p-4 rounded w-full">
            {{ session('success') }}
        </div>
    @endif
</div>

<div class="w-full h-fit flex">
    <div class="w-3/12 p-4 h-fit">
        <div class="profile-container p-4 border rounded-xl bg-white">

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

    <div class="w-9/12 p-4 h-fit">
        <!-- ------------------------------------------------------------------ Button ----------------------------------------------------------------- -->
        <div class="tabs flex mb-4 w-full">
            <button class="tab-link bg-blue-500 text-white font-bold py-2 px-4 rounded" onclick="showTab('videos')">Videos</button>
            <button class="tab-link bg-white text-black font-bold py-2 px-4 rounded border" onclick="showTab('posts')">Post</button>
            <button class="tab-link bg-white text-black font-bold py-2 px-4 rounded border" onclick="showTab('products')">Product</button>
            <button class="tab-link bg-white text-black font-bold py-2 px-4 rounded border" onclick="showTab('products')">Transaction History</button>
            <div class="ml-auto relative inline-block text-left">
                <button class="tab-link bg-white text-black font-bold py-2 px-4 rounded border" onclick="toggleAddDropdown()">
                    <i class="fas fa-plus"></i> Add
                </button>
                <div id="addDropdown" class="dropdown-menu hidden absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded shadow-lg">
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100" onclick="showModal('addVideoModal')">Add Video</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100" onclick="showModal('addVideoModalShort')">Add Shorts</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100" onclick="showModal('addProductModal')">Add Product</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100" onclick="showModal('addPostModal')">Add Post</a>
                </div>
            </div>
        </div>

        <!-- ------------------------------------------------------------------ Video Tab ----------------------------------------------------------------- -->
        <div id="videos" class="tab-content">
            <div class="w-full">
                @foreach ($videos as $video)
                    <div class="flex p-4 border rounded mt-2 mb-2 hover:shadow-lg relative group">
                        <div class="overflow-hidden h-24 w-44 rounded">
                            <img src="{{ asset($video->VideoImage) }}" alt="Video Image" class="w-full h-full object-cover">
                        </div>
                        <div class="flex flex-col ml-5 w-9/12">
                            <h2 class="font-bold text-lg">{{ $video->Title }}</h2>
                            <h1>{{ Str::limit($video->Description, 200, ' ...') }}</h1>
                        </div>
                        <div class="absolute top-4 right-4 flex flex-col items-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <div class="relative option-btn-container">
                                <img src="{{ asset('Assets/OptionBtn.png') }}" alt="Options" class="w-5 h-5 option-btn cursor-pointer" onclick="toggleDropdown(this)">
                                <div class="dropdown-menu hidden absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded shadow-lg">
                                    <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100" onclick="showEditModal('{{ $video->VideoID }}')">Update Video</a>
                                    <form action="{{ route('video.delete', ['id' => $video->VideoID]) }}" method="POST" class="block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100">Delete Video</button>
                                    </form>
                                </div>
                            </div>
                            <div class="relative share-btn-container mt-4">
                                <img src="{{ asset('Assets/SharedBtn.png') }}" alt="Share" class="w-5 h-5 share-btn cursor-pointer">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div id="editModal" class="fixed z-50 inset-0 overflow-y-auto hidden">
            <div class="flex items-center justify-center min-h-screen px-4">
                <div class="fixed inset-0 transition-opacity">
                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                </div>
                <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all max-w-lg w-full p-6">
                    <h2 class="text-2xl font-bold mb-4">Edit Video</h2>
                    <form id="editForm" action="#" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="title" class="block text-gray-700">Title</label>
                            <input type="text" id="editTitle" name="title" class="block w-full border rounded px-2 py-1">
                        </div>
                        <div class="mb-4">
                            <label for="description" class="block text-gray-700">Description</label>
                            <textarea id="editDescription" name="description" class="block w-full border rounded px-2 py-1"></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="video_image" class="block text-gray-700">Video Image</label>
                            <input type="file" id="editVideoImage" name="video_image" class="block w-full">
                        </div>
                        <div class="flex justify-end">
                            <button type="button" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded mr-2" onclick="closeEditModal()">Cancel</button>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div id="addVideoModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden" onclick="closeModalOnClickOutside(event, 'addVideoModal')">
            <div class="bg-white p-6 rounded-lg shadow-lg w-1/2" onclick="event.stopPropagation()">
                <h2 class="text-xl font-bold mb-4">Add Video</h2>
                <form action="{{ route('video.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="title" class="block text-gray-700">Title</label>
                        <input type="text" name="title" id="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                    <div class="mb-4">
                        <label for="description" class="block text-gray-700">Description</label>
                        <textarea name="description" id="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="video_image" class="block text-gray-700">Video Image</label>
                        <input type="file" name="video_image" id="video_image" class="block w-full" required>
                    </div>
                    <div class="mb-4">
                        <label for="video_file" class="block text-gray-700">Upload Video</label>
                        <input type="file" name="video_file" id="video_file" class="block w-full" required>
                    </div>
                    <div class="flex justify-end">
                        <button type="button" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2" onclick="closeAddVideoModal()">Cancel</button>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Video</button>
                    </div>
                </form>
            </div>
        </div>

        <div id="addVideoModalShort" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden" onclick="closeModalOnClickOutside(event, 'addVideoModalShort')">
            <div class="bg-white p-6 rounded-lg shadow-lg w-1/2" onclick="event.stopPropagation()">
                <h2 class="text-xl font-bold mb-4">Add Short</h2>
                <form action="{{ route('video.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="title" class="block text-gray-700">Title</label>
                        <input type="text" name="title" id="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                    <div class="mb-4">
                        <label for="description" class="block text-gray-700">Description</label>
                        <textarea name="description" id="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="video_image" class="block text-gray-700">Short Image</label>
                        <input type="file" name="video_image" id="video_image" class="block w-full" required>
                    </div>
                    <div class="mb-4">
                        <label for="video_file" class="block text-gray-700">Upload Short</label>
                        <input type="file" name="video_file" id="video_file" class="block w-full" required>
                    </div>
                    <div class="flex justify-end">
                        <button type="button" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2" onclick="closeModal('addVideoModalShort')">Cancel</button>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Short</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- ------------------------------------------------------------------ Post Tab ----------------------------------------------------------------- -->
        <div id="posts" class="tab-content hidden">
            @foreach ($posts as $post)
                <div class="post-item p-4 border rounded-lg mb-4">
                    <h3 class="text-lg font-bold">{{ $post->title }}</h3>
                    <p class="text-sm text-gray-600">{{ $post->content }}</p>
                </div>
            @endforeach
        </div>

        <div id="addPostModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden" onclick="closeModalOnClickOutside(event, 'addPostModal')">
            <div class="bg-white p-6 rounded-lg shadow-lg w-1/2" onclick="event.stopPropagation()">
                <h2 class="text-xl font-bold mb-4">Add Post</h2>
                <form action="{{ route('video.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="title" class="block text-gray-700">Title</label>
                        <input type="text" name="title" id="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                    <div class="mb-4">
                        <label for="description" class="block text-gray-700">Description</label>
                        <textarea name="description" id="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="video_image" class="block text-gray-700">Post Image</label>
                        <input type="file" name="video_image" id="video_image" class="block w-full" required>
                    </div>
                    <div class="flex justify-end">
                        <button type="button" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2" onclick="closeModal('addPostModal')">Cancel</button>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Post</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- ------------------------------------------------------------------ Product Tab ----------------------------------------------------------------- -->
        <div id="products" class="tab-content hidden">
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

        <div id="addProductModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden" onclick="closeModalOnClickOutside(event, 'addProductModal')">
            <div class="bg-white p-6 rounded-lg shadow-lg w-1/2" onclick="event.stopPropagation()">
                <h2 class="text-xl font-bold mb-4">Add Product</h2>
                <form action="{{ route('video.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="title" class="block text-gray-700">Product name</label>
                        <input type="text" name="title" id="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                    <div class="mb-4">
                        <label for="description" class="block text-gray-700">Description</label>
                        <textarea name="description" id="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="video_image" class="block text-gray-700">Product Image</label>
                        <input type="file" name="video_image" id="video_image" class="block w-full" required>
                    </div>
                    <div class="flex justify-end">
                        <button type="button" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2" onclick="closeModal('addProductModal')">Cancel</button>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Product</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection


@push('scripts')
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <script src="{{ asset('js/profile.js') }}"></script>
@endpush
