@extends('components.shop-layout')
@section('title', 'Auction')
@section('content')
    <div class="flex m-4 space-x-4">
        <a href="{{ route('shop.index') }}" 
        class="bg-blue-500 text-white font-semibold py-2 px-4 rounded hover:bg-blue-600 transition duration-200">
        MarketPlace
        </a>
        <a href="{{ route('auction.index') }}" 
        class="border border-blue-500 text-blue-500 font-semibold py-2 px-4 rounded hover:bg-blue-500 hover:text-white transition duration-200">
        Auction
        </a>
    </div>
    <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($auctions as $auction)
                <div class="bg-white p-4 rounded-lg shadow-md">
                    <a href="{{ route('shop.show', $auction) }}" class="product-link block">
                        @if ($auction->pictures->isNotEmpty())
                            <div class="product-image h-60 w-full mb-4 rounded-lg">
                                <img src="{{ asset('storage/' . $auction->pictures->first()->PictureData) }}" alt="{{ $auction->AuctionProductName }}" class="h-60 w-full object-cover image1">
                                @if ($auction->pictures->count() > 1)
                                    <img src="{{ asset('storage/' . $auction->pictures->skip(1)->first()->PictureData) }}" alt="{{ $auction->AuctionProductName }}" class="h-60 w-full object-cover image2">
                                @else
                                    <img src="{{ asset('storage/' . $auction->pictures->first()->PictureData) }}" alt="{{ $auction->ProductName }}" class="h-60 w-full object-cover image2">
                                @endif
                            </div>
                        @endif
                        <h2 class="text-lg font-bold">{{ Str::limit($auction->ProductName, 30, '...') }}</h2>
                    </a>
                    <a href="{{ route('userPage', ['user' => $auction->UserID]) }}" class="flex items-center mt-2">
                        <img src="{{ asset($auction->user->ProfileImage) }}" alt="{{ $auction->user->Name }}" class="w-10 h-10 rounded-full mr-4">
                        <p class="text-gray-500">{{ $auction->user->StoreName }}</p>
                    </a>
                    <p class="text-red-500 font-bold mt-2">Rp {{ number_format($auction->ProductPrice, 0, ',', '.') }}</p>
                </div>
            @endforeach
        </div>
        <div class="mt-6 text-right">
            {{ $auctions->links() }}
        </div>
    </div>
@endsection
