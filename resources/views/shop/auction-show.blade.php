@extends('components.shop-layout')
@section('title', 'Product')
@section('content')
    <a href="{{ route('auction.index') }}" class="block text-blue-500 mt-2">&larr; Back to Auction</a>
    <div class="container mx-auto py-8">
        <div class="flex flex-wrap md:flex-nowrap">
            <div class="w-full md:w-1/2 p-4 flex flex-col items-center">
                <div class="relative w-full flex flex-col items-center">
                    <img id="productImage" src="{{ asset('storage/' . $auction->pictures->first()->PictureData) }}"
                    alt="{{ $auction->AuctionProductName }}" class="mx-auto mb-4" style="width: 30rem; height: 36rem; object-cover;">
                    <div class="flex justify-between w-full">
                        <button id="prevBtn" class="bg-gray-300 text-gray-700 px-2 py-1 rounded-l">&larr;</button>
                        <button id="nextBtn" class="bg-gray-300 text-gray-700 px-2 py-1 rounded-r">&rarr;</button>
                    </div>
                </div>
            </div>
            <div class="w-full md:w-1/2 p-4 flex flex-col">
                <h1 class="text-3xl font-bold mb-4">{{ $auction->AuctionProductName }}</h1>
                <div class="text-2xl text-red-600 mb-4">
                    <span class="text-black font-bold">Start Price: </span>Rp {{ number_format($auction->AuctionProductStartPrice, 0, ',', '.') }}
                </div>
                <div class="text-2xl text-red-600 mb-4">
                    <span class="text-black font-bold">End Price: </span>Rp {{ number_format($auction->AuctionProductEndPrice, 0, ',', '.') }}
                </div>
                <p class="mb-4">{{ $auction->AuctionProductDescription }}</p>
                <div class="flex items-center mb-4">
                    <img src="{{ asset($auction->user->ProfileImage) }}"
                         alt="{{ $auction->user->Name }}" class="w-10 h-10 rounded-full mr-4">
                    <div>
                        <span class="font-bold">{{ $auction->user->StoreName }}</span>
                        <span class="text-gray-600">({{ $auction->user->StoreRating }} Rata-rata ulasan)</span>
                    </div>
                </div>
                <form action="{{ route('auction.update', [$auction->AuctionID]) }}" method="POST" class="bg-white p-4 rounded-lg shadow-md w-full">
                    @csrf
                    <div class="mb-4">
                        <div class="text-2xl text-red-600 mb-4">
                            <span class="text-black font-bold">Current Top Bid: </span>Rp {{ number_format($auction->AuctionTopBid, 0, ',', '.') }}
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="subtotal" class="block text-gray-700 text-sm font-bold mb-2">Input Bid</label>
                        <input type="number" name="bid" id="bid" class="form-control w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" value="{{ old('bid') }}">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                <div>
                                    <h6 class="text-red-500">{{ $error }}</h6>
                                </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="flex items-center justify-center">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-blue-600">Bid</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        window.productImages = {!! json_encode($auction->pictures->pluck('PictureData')->all()) !!};
    </script>

    @push('scripts')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="{{ asset('js/shop/show.js') }}"></script>
    @endpush

@endsection
