<x-shop-layout>
    <a href="{{ route('shop.index') }}" class="block text-blue-500 mt-2">&larr; Back to shops</a>
    <div class="container mx-auto py-8">
        <div class="flex flex-wrap md:flex-nowrap">
            <div class="w-full md:w-1/2 p-4 flex flex-col items-center">
                <div class="relative w-full flex justify-center items-center">
                    <button id="prevBtn" class="absolute left-0 bg-gray-300 text-gray-700 px-2 py-1 rounded-l transform -translate-y-1/2">Prev</button>
                    <img id="productImage" src="{{ asset('storage/' . $product->pictures->first()->PictureData) }}"
                         alt="{{ $product->ProductName }}" class="mx-auto" style="width: 30rem; height: 36rem; object-cover;">
                    <button id="nextBtn" class="absolute right-0 bg-gray-300 text-gray-700 px-2 py-1 rounded-r transform -translate-y-1/2">Next</button>
                </div>
            </div>
            <div class="w-full md:w-1/2 p-4 flex flex-col">
                <h1 class="text-3xl font-bold mb-4">{{ $product->ProductName }}</h1>
                <div class="text-2xl text-red-600 mb-4">
                    Rp {{ number_format($product->ProductPrice, 0, ',', '.') }}
                </div>
                <p class="mb-4">{{ $product->ProductDescription }}</p>
                <div class="flex items-center mb-4">
                    <img src="{{ asset('storage/' . $product->pictures->first()->PictureData) }}"
                         alt="{{ $product->user->Name }}" class="w-10 h-10 rounded-full mr-4">
                    <div>
                        <span class="font-bold">{{ $product->user->Name }}</span>
                        <span class="text-gray-600">({{ $product->user->StoreRating }} Rata-rata ulasan)</span>
                    </div>
                </div>
                <form action="{{ route('cart.store', $product->ProductID) }}" method="POST" class="bg-white p-4 rounded-lg shadow-md w-full">
                    @csrf
                    <div class="mb-4">
                        <label for="quantity" class="block text-gray-700 text-sm font-bold mb-2">Atur jumlah dan catatan</label>
                        <div class="flex items-center">
                            <button type="button" class="btn btn-default btn-number bg-gray-300 text-gray-700 px-2 py-1 rounded-l" data-type="minus" data-field="quantity">-</button>
                            <input type="text" name="quantity" class="form-control input-number w-16 text-center border-gray-300" value="1" min="1" max="{{ $product->quantity }}">
                            <button type="button" class="btn btn-default btn-number bg-gray-300 text-gray-700 px-2 py-1 rounded-r" data-type="plus" data-field="quantity">+</button>
                        </div>
                        <small class="text-gray-600">Stock total: {{ $product->quantity }}</small>
                    </div>
                    <div class="mb-4">
                        <label for="notes" class="block text-gray-700 text-sm font-bold mb-2">Catatan</label>
                        <textarea name="notes" id="notes" class="form-control w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" rows="3"></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="subtotal" class="block text-gray-700 text-sm font-bold mb-2">Subtotal</label>
                        <input type="text" name="subtotal" id="subtotal" class="form-control w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" value="Rp {{ number_format($product->ProductPrice, 0, ',', '.') }}" readonly>
                    </div>
                    <div class="flex items-center justify-between">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-blue-600">Add Cart</button>
                        <button type="button" class="bg-green-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-green-600">Purchase</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        window.productImages = {!! json_encode($product->pictures->pluck('PictureData')->all()) !!};
    </script>

    @push('scripts')
        <!-- Include jQuery from a CDN or your local files -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="{{ asset('js/shop/show.js') }}"></script>
    @endpush

</x-shop-layout>
