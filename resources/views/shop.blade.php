@extends('layout')
@section('title', 'Shop')
@section('content')

<h1>Hello</h1>
<div class="bg-gray-100">
    <div class="container mx-auto mt-10">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach($products as $product)
                <div class="bg-white p-4 rounded-lg shadow-md">
                    @if($product->pictures->isNotEmpty())
                        <img src="{{ $product->pictures->first()->PictureData }}" alt="{{ $product->ProductName }}" class="w-full h-48 object-cover mb-4 rounded">
                    @else
                        <img src="path/to/default-image.jpg" alt="No image available" class="w-full h-48 object-cover mb-4 rounded">
                    @endif
                    <h2 class="text-lg font-semibold">{{ $product->ProductName }}</h2>
                    <p class="text-gray-600">{{ $product->ProductDescription }}</p>
                    <p class="text-orange-500 text-lg font-bold">Rp {{ number_format($product->ProductPrice, 0, ',', '.') }}</p>
                </div>
            @endforeach
        </div>
        <div class="mt-6">
            {{ $products->links() }}
        </div>
    </div>
</div>
@endsection
