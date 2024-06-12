@extends('components.layout')

@section('title', 'Profile')

@section('content')
<div class="w-full flex">
    @if (session('success'))
        <div class="m-5 mb-0 alert alert-success bg-green-500 text-white p-4 rounded w-full">
            {{ session('success') }}
        </div>
    @endif
</div>

<div class="w-full h-fit flex">
    @if (auth()->user()->Role == 'user')
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
    @else
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

                    <div class="space-y-2">
                        <label for="name" class="block text-gray-700 font-semibold">Store Name</label>
                        <input type="text" name="StoreName" id="StoreName" value="{{ $user->StoreName }}" class="block w-full border rounded px-3 py-2 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div class="space-y-2">
                        <label for="name" class="block text-gray-700 font-semibold">Store Description</label>
                        <textarea type="text" name="StoreDescription" id="StoreDescription"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ $user->StoreDescription }}</textarea>
                    </div>

                    <div class="space-y-2">
                        <label for="name" class="block text-gray-700 font-semibold">Store Start Time</label>
                        <input type="time" name="StoreStartTime" id="StoreStartTime" value="{{ $user->StoreStartTime }}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>

                    <div class="space-y-2">
                        <label for="name" class="block text-gray-700 font-semibold">Store End Time</label>
                        <input type="time" name="StoreEndTime" id="StoreEndTime" value="{{ $user->StoreEndTime }}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>

                    <button type="submit" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Update Profile</button>
                </form>
            </div>
        </div>
    @endif

    <div class="w-9/12 p-4 h-fit">
        <!-- ------------------------------------------------------------------ Button ----------------------------------------------------------------- -->
        <div class="tabs flex mb-4 w-full">
            <button class="tab-link bg-blue-500 text-white font-bold py-2 px-4 rounded" onclick="showTab('videos')">Videos</button>
            <button class="tab-link bg-white text-black font-bold py-2 px-4 rounded border" onclick="showTab('posts')">Post</button>
            @if (auth()->user()->Role == 'seller')
                <button class="tab-link bg-white text-black font-bold py-2 px-4 rounded border" onclick="showTab('products')">Product</button>
                <button class="tab-link bg-white text-black font-bold py-2 px-4 rounded border" onclick="showTab('transaction')">Transaction History</button>
            @endif
            <div class="ml-auto relative inline-block text-left">
                <button class="tab-link bg-white text-black font-bold py-2 px-4 rounded border" onclick="toggleAddDropdown()">
                    <i class="fas fa-plus"></i> Add
                </button>
                <div id="addDropdown" class="dropdown-menu hidden absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded shadow-lg">
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100" onclick="showModal('addVideoModal')">Add Video</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100" onclick="showModal('addVideoModalShort')">Add Shorts</a>
                    @if (auth()->user()->Role == 'seller')
                        <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100" onclick="showModal('addProductModal')">Add Product</a>
                    @endif
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
                        <div class="flex flex-col ml-5 w-8/12">
                            <h2 class="font-bold text-lg">{{ $video->Title }}</h2>
                            <h1>{{ Str::limit($video->Description, 200, ' ...') }}</h1>
                        </div>
                        <div class="flex flex-col ml-5 w-3/12">
                            <h2 class="font-bold text-lg">Video Type</h2>
                            <h1>{{ $video->VideoType }}</h1>
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
                                @php
                                    $videoUrl = $video->VideoType == 'Shorts' ? url('shorts/' . $video->VideoID) : url('videos/' . $video->VideoID);
                                @endphp
                                <img src="{{ asset('Assets/SharedBtn.png') }}" alt="Share" class="w-5 h-5 share-btn cursor-pointer" onclick="copyToClipboard('{{ $videoUrl }}')">
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
                <form action="{{ route('video.storeshort') }}" method="POST" enctype="multipart/form-data">
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
            <div class="container w-5/12 mx-auto mt-9 p-0 flex flex-col">
                @foreach ($posts as $post)
                    <div class="post-item p-4 border rounded-lg mb-4 relative group">
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
                        <div class="absolute top-4 right-4 flex flex-col items-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <div class="relative option-btn-container">
                                <img src="{{ asset('Assets/OptionBtn.png') }}" alt="Options" class="w-5 h-5 option-btn cursor-pointer" onclick="toggleDropdown(this)">
                                <div class="dropdown-menu hidden absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded shadow-lg">
                                    <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100" onclick="showEditModal('{{ $post->PostID }}', '{{ $post->Title }}', '{{ $post->Description }}')">Update Post</a>
                                    <form action="{{ route('post.delete', ['id' => $post->PostID]) }}" method="POST" class="block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100">Delete Post</button>
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

        <div id="editPostModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden" onclick="closeModalOnClickOutside(event, 'editPostModal')">
            <div class="bg-white p-6 rounded-lg shadow-lg w-1/2" onclick="event.stopPropagation()">
                <h2 class="text-xl font-bold mb-4">Edit Post</h2>
                <form id="editPostForm" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="post_id" id="editPostId">
                    <div class="mb-4">
                        <label for="editPostTitle" class="block text-gray-700">Title</label>
                        <input type="text" name="title" id="editPostTitle" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                    <div class="mb-4">
                        <label for="editPostDescription" class="block text-gray-700">Description</label>
                        <textarea name="description" id="editPostDescription" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required></textarea>
                    </div>
                    <div class="flex justify-end">
                        <button type="button" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2" onclick="closeModal('editPostModal')">Cancel</button>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update Post</button>
                    </div>
                </form>
            </div>
        </div>

        <div id="addPostModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden" onclick="closeModalOnClickOutside(event, 'addPostModal')">
            <div class="bg-white p-6 rounded-lg shadow-lg w-1/2" onclick="event.stopPropagation()">
                <h2 class="text-xl font-bold mb-4">Add Post</h2>
                <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
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
                        <label for="images" class="block text-gray-700">Post Images</label>
                        <input type="file" name="images[]" id="images" class="block w-full" multiple required>
                    </div>
                    <div class="flex justify-end">
                        <button type="button" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2" onclick="closeModal('addPostModal')">Cancel</button>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Post</button>
                    </div>
                </form>
            </div>
        </div>
        {{-- @if (auth()->user()->Role == 'seller') --}}
            <!-- ------------------------------------------------------------------ Product Tab ----------------------------------------------------------------- -->
            <div id="products" class="tab-content hidden">
                <div class="container mx-auto px-4 py-8">
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                        @foreach ($products as $product)
                                <div class="bg-white p-4 rounded-lg shadow-md">
                                    @if ($product->pictures->isNotEmpty())
                                        <div class="product-image h-60 w-full mb-4 rounded-lg">
                                            <img src="{{ asset('storage/' . $product->pictures->first()->PictureData) }}" alt="{{ $product->ProductName }}" class="h-60 w-full object-cover image1">
                                            @if ($product->pictures->count() > 1)
                                                <img src="{{ asset('storage/' . $product->pictures->skip(1)->first()->PictureData) }}" alt="{{ $product->ProductName }}" class="h-60 w-full object-cover image2">
                                            @else
                                                <img src="{{ asset('storage/' . $product->pictures->first()->PictureData) }}" alt="{{ $product->ProductName }}" class="h-60 w-full object-cover image2">
                                            @endif
                                        </div>
                                    @endif
                                    <h2 class="text-lg font-bold">{{ Str::limit($product->ProductName, 30, '...') }}</h2>
                                    <p class="text-gray-500">{{ $product->user->StoreName }}</p>
                                    <p class="text-red-500 font-bold mt-2">Rp {{ number_format($product->ProductPrice, 0, ',', '.') }}</p>
                                    <div class="mt-2">
                                        <button type="button" class="bg-green-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-green-600" onclick="showEditProductModal('{{ $product->ProductID }}')">Edit</button>
                                        <button type="button" class="bg-red-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-red-600" onclick="deleteProduct(this, '{{ route('product.destroy', ['msProduct' => $product->ProductID]) }}')">Delete</button>
                                    </div>
                                </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div id="addProductModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden" onclick="closeModalOnClickOutside(event, 'addProductModal')">
                <div class="bg-white p-6 rounded-lg shadow-lg w-1/2" onclick="event.stopPropagation()">
                    <h2 class="text-xl font-bold mb-4">Add Product</h2>
                    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="ProductName" class="block text-gray-700">Product Name</label>
                            <input type="text" name="ProductName" id="ProductName" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>
                        <div class="mb-4">
                            <label for="ProductDescription" class="block text-gray-700">Product Description</label>
                            <textarea name="ProductDescription" id="ProductDescription" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="ProductPrice" class="block text-gray-700">Product Price</label>
                            <input type="number" name="ProductPrice" id="ProductPrice" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>
                        <div class="mb-4">
                            <label for="Quantity" class="block text-gray-700">Quantity</label>
                            <input type="number" name="Quantity" id="Quantity" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>

                        <div class="mb-4">
                            <label for="ProductImages" class="block text-gray-700">Product Images</label>
                            <input type="file" name="ProductImages[]" id="ProductImages" class="block w-full" multiple required>
                        </div>

                        <div class="flex justify-end">
                            <button type="button" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2" onclick="closeModal('addProductModal')">Cancel</button>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Product</button>
                        </div>
                    </form>
                </div>
            </div>

            <div id="editProductModal" class="fixed inset-0 overflow-y-auto hidden">
                <div class="flex items-center justify-center min-h-screen px-4">
                    <div class="fixed inset-0 transition-opacity">
                        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                    </div>
                    <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all max-w-lg w-full p-6">
                        <h2 class="text-2xl font-bold mb-4">Edit Product</h2>
                        <form id="editProductForm" action="#" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-4">
                                <label for="ProductName" class="block text-gray-700">Product Name</label>
                                <input type="text" id="editProductName" name="ProductName" class="block w-full border rounded px-2 py-1">
                            </div>
                            <div class="mb-4">
                                <label for="ProductDescription" class="block text-gray-700">Product Description</label>
                                <textarea id="editProductDescription" name="ProductDescription" class="block w-full border rounded px-2 py-1"></textarea>
                            </div>
                            <div class="mb-4">
                                <label for="ProductPrice" class="block text-gray-700">Product Price</label>
                                <input type="number" id="editProductPrice" name="ProductPrice" class="block w-full border rounded px-2 py-1">
                            </div>
                            <div class="mb-4">
                                <label for="Quantity" class="block text-gray-700">Quantity</label>
                                <input type="number" id="editQuantity" name="Quantity" class="block w-full border rounded px-2 py-1">
                            </div>
                            <div class="mb-4">
                                <label for="ProductImages" class="block text-gray-700">Product Images</label>
                                <input type="file" id="editProductImages" name="ProductImages[]" class="block w-full" multiple>
                            </div>
                            <div class="flex justify-end">
                                <button type="button" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded mr-2" onclick="closeEditModal()">Cancel</button>
                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- ------------------------------------------------------------------ Transaction History ----------------------------------------------------------------- -->
            <div id="transaction" class="tab-content hidden">
                <div class="container mx-auto my-5 p-5 bg-gray-100">
                    @foreach ($transactionHeader as $header)
                        @foreach ($header->transactionDetails as $detail)
                            @if ($detail->product->UserID == auth()->user()->UserID)
                                <div class="bg-white shadow-md rounded p-6 mb-4">
                                    <div class="flex justify-between items-center mb-4">
                                        <div>
                                            <p class="text-gray-700">Shopping</p>
                                            <p class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($header->created_at)->format('d M Y') }}</p>
                                        </div>
                                        @if ($detail->TransactionStatus == 'Success')
                                            <div>
                                                <span class="bg-green-200 text-green-700 px-2 py-1 rounded">{{ $detail->TransactionStatus }}</span>
                                            </div>

                                        @else

                                            <div>
                                                <span class="bg-orange-200 text-orange-500 px-2 py-1 rounded">{{ $detail->TransactionStatus }}</span>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="flex items-center mb-4">
                                        <div>
                                            <p class="text-gray-700 font-bold"> Bought By: <span class="text-red-500 font-bold">{{ $header->user->Name }}</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="flex justify-between">
                                        <div class="flex items-center mb-4">
                                            <img src="{{ asset('storage/' . $detail->product->pictures->first()->PictureData) }}" alt="{{ $detail->product->ProductName }}" class="w-16 h-16 rounded mr-4">
                                            <div>
                                                <p class="text-gray-800 font-bold">{{ $detail->product->ProductName }}</p>
                                                @php
                                                    $total = $detail->Price * $detail->Quantity;
                                                @endphp
                                                <p class="text-sm text-gray-600">{{ $detail->Quantity }} barang x Rp{{ number_format($detail->product->ProductPrice, 0, ',', '.') }}</p>
                                            </div>
                                        </div>
                                        <div>
                                            <h2 class="text-2xl font-bold">Total: <span class="text-red-500 font-bold mt-2"> Rp {{ number_format($total, 0, ',', '.') }},00</span></h2>
                                        </div>
                                    </div>
                                    @if ($detail->TransactionStatus == 'Pending')
                                        <form action="{{ route('transaction.updateStatus', ['transactionID' => $detail->TransactionID, 'productID' => $detail->ProductID]) }}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-green-600">Accept Order</button>
                                        </form>
                                    @endif
                                </div>
                            @endif
                        @endforeach
                    @endforeach
                </div>
            </div>
        {{-- @endif --}}
    </div>
</div>
@endsection


@push('scripts')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('css/shop/layout.css') }}">
    <script src="{{ asset('js/profile.js') }}"></script>
    <script>
        function deleteProduct(button, url) {
            const form = document.createElement('form');
            form.action = url;
            form.method = 'POST';
            const csrfToken = '{{ csrf_token() }}';
            form.innerHTML = `
                <input type="hidden" name="_token" value="${csrfToken}">
                <input type="hidden" name="_method" value="DELETE">
            `;
            document.body.appendChild(form);
            form.submit();
        }

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
