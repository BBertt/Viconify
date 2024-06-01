<x-shop-layout>
    <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($carts as $cart)
                <div class="bg-white p-4 rounded-lg shadow-md">
                    <div class="h-60 w-full mb-4 rounded-lg overflow-hidden">
                        <img src="{{ asset('storage/' . $cart->product->pictures->first()->PictureData) }}" alt="{{ $cart->product->ProductName }}" class="h-60 w-full object-cover">
                    </div>
                    <h2 class="text-lg font-bold">{{ Str::limit($cart->product->ProductName, 30, '...') }}</h2>
                    <p class="text-gray-500">{{ $cart->product->user->Name }}</p>
                    <p class="text-red-500 font-bold mt-2">Rp {{ number_format($cart->product->ProductPrice, 0, ',', '.') }}</p>

                    <div class="flex items-center mt-4">
                        <button type="button" class="btn btn-default btn-number bg-gray-300 text-gray-700 px-2 py-1 rounded-l" data-type="minus" data-field="quantity">-</button>
                        <input type="text" name="quantity" class="form-control input-number w-16 text-center border-gray-300" value="{{ $cart->Quantity }}" min="1" max="{{ $cart->product->Quantity }}">
                        <button type="button" class="btn btn-default btn-number bg-gray-300 text-gray-700 px-2 py-1 rounded-r" data-type="plus" data-field="quantity">+</button>
                    </div>

                    <div class="flex items-center justify-between mt-4">
                        <button type="button" class="bg-orange-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-orange-600">Cancel</button>
                        <button type="button" class="bg-orange-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-orange-600">Purchase</button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-shop-layout>
