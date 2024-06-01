@extends('layout')
@section('title', 'Shop')
@section('content')

<body class="bg-gray-100">
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

    <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($products as $product)
                <div class="bg-white p-4 rounded-lg shadow-md">
                    @if ($product->pictures->isNotEmpty())
                        <div class="product-image h-60 w-full mb-4 rounded-lg overflow-hidden">
                            <img src="{{ asset('storage/' . $product->pictures->first()->PictureData) }}" alt="{{ $product->ProductName }}" class="h-60 w-full object-cover image1">
                            @if ($product->pictures->count() > 1)
                                <img src="{{ asset('storage/' . $product->pictures->skip(1)->first()->PictureData) }}" alt="{{ $product->ProductName }}" class="h-60 w-full object-cover image2">
                            @else
                                <img src="{{ asset('storage/' . $product->pictures->first()->PictureData) }}" alt="{{ $product->ProductName }}" class="h-60 w-full object-cover image2">
                            @endif
                        </div>
                    @endif
                    <h2 class="text-lg font-bold">{{ $product->ProductName }}</h2>
                    <p class="text-gray-500">{{ $product->user->Name }}</p>
                    <p class="text-red-500 font-bold mt-2">Rp {{ number_format($product->ProductPrice, 0, ',', '.') }}</p>
                </div>
            @endforeach
        </div>
        <div class="mt-6 text-right">
            {{ $products->links() }}
        </div>
    </div>
</body>

@endsection


@push('scripts')
    <link rel="stylesheet" href="{{ asset('css/shop.css') }}">
@endpush