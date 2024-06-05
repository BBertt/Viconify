@extends('shop-layout')
@section('title', 'Shop')
@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($products as $product)
                <a href="{{ route('shop.show', $product) }}" class="product-link">
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
                    </div>
                </a>
            @endforeach
        </div>
        <div class="mt-6 text-right">
            {{ $products->links() }}
        </div>
    </div>
@endsection
