<x-shop-layout>
    <div class="container mx-auto px-4 py-8">
        @php
            $subtotal = 0;
        @endphp

        @foreach ($carts as $cart)
            @php
                $subtotal += $cart->product->ProductPrice * $cart->Quantity;
            @endphp
        @endforeach

        <div class="mb-8">
            <h2 class="text-2xl font-bold">Subtotal: <span id="subtotal">{{ number_format($subtotal, 0, ',', '.') }}</span></h2>
        </div>

        <form action="{{ route('purchase') }}" method="POST" id="purchaseForm">
            @csrf
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($carts as $cart)
                    <div class="bg-white p-4 rounded-lg shadow-md cart-item" data-price="{{ $cart->product->ProductPrice }}" data-max-quantity="{{ $cart->product->Quantity }}">
                        <input type="hidden" name="products[{{ $cart->product->ProductID }}][ProductID]" value="{{ $cart->product->ProductID }}">
                        <div class="h-60 w-full mb-4 rounded-lg overflow-hidden">
                            <img src="{{ asset('storage/' . $cart->product->pictures->first()->PictureData) }}" alt="{{ $cart->product->ProductName }}" class="h-60 w-full object-cover">
                        </div>
                        <h2 class="text-lg font-bold">{{ Str::limit($cart->product->ProductName, 30, '...') }}</h2>
                        <p class="text-gray-500">{{ $cart->product->user->Name }}</p>
                        <p class="text-red-500 font-bold mt-2">Rp {{ number_format($cart->product->ProductPrice, 0, ',', '.') }}</p>

                        <div class="flex items-center mt-4">
                            <button type="button" class="btn btn-default btn-number bg-gray-300 text-gray-700 px-2 py-1 rounded-l" onclick="changeQuantity(this, -1)">-</button>
                            <input type="text" name="products[{{ $cart->product->ProductID }}][Quantity]" class="form-control input-number w-16 text-center border-gray-300 quantity" value="{{ $cart->Quantity }}" min="1" max="{{ $cart->product->Quantity }}">
                            <button type="button" class="btn btn-default btn-number bg-gray-300 text-gray-700 px-2 py-1 rounded-r" onclick="changeQuantity(this, 1)">+</button>
                        </div>

                        <div class="flex items-center justify-center mt-4">
                            <button type="button" class="bg-red-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-red-600">Delete</button>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-8 text-center">
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-green-600">Purchase</button>
            </div>
        </form>
    </div>

    @push('scripts')
        <script src="{{ asset('js/cart/index.js') }}"></script>
    @endpush

</x-shop-layout>
