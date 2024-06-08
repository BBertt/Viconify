@extends('components.shop-layout')
@section('title', 'Cart')
@section('content')
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
            <h2 class="text-2xl font-bold">Total: <span id="subtotal" class="text-red-500 font-bold mt-2"> Rp {{ number_format($subtotal, 0, ',', '.') }},00</span></h2>
        </div>

        @if ($errors->any())
            <div class="mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text-red-500 text-xl">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('success'))
            <div class="text-green-500 text-xl">{{ session('success') }}</div>
        @endif

        <form action="{{ route('purchase') }}" method="POST" id="purchaseForm">
            @csrf
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($carts as $cart)
                    <div class="bg-white p-4 rounded-lg shadow-md cart-item" data-cart-id="{{ $cart->CartID }}" data-price="{{ $cart->product->ProductPrice }}" data-max-quantity="{{ $cart->product->Quantity }}">
                        <div class="h-60 w-full mb-4 rounded-lg overflow-hidden">
                            <img src="{{ asset('storage/' . $cart->product->pictures->first()->PictureData) }}" alt="{{ $cart->product->ProductName }}" class="h-60 w-full object-cover">
                        </div>
                        <h2 class="text-lg font-bold">{{ Str::limit($cart->product->ProductName, 30, '...') }}</h2>
                        <p class="text-gray-500">{{ $cart->product->user->Name }}</p>
                        <p class="text-red-500 font-bold mt-2">Rp {{ number_format($cart->product->ProductPrice, 0, ',', '.') }}</p>

                        <div class="flex items-center mt-4">
                            <button type="button" class="btn btn-default btn-number bg-gray-300 text-gray-700 px-2 py-1 rounded-l" onclick="changeQuantity(this, -1)">-</button>
                            <input type="text" class="form-control input-number w-16 text-center border-gray-300 quantity" value="{{ $cart->Quantity }}" min="1" max="{{ $cart->product->Quantity }}">
                            <button type="button" class="btn btn-default btn-number bg-gray-300 text-gray-700 px-2 py-1 rounded-r" onclick="changeQuantity(this, 1)">+</button>
                        </div>

                        <div class="flex items-center justify-center mt-4">
                            <button type="button" class="bg-red-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-red-600" onclick="deleteCartItem(this, '{{ route('cart.destroy', ['cart' => $cart->CartID]) }}')">Delete</button>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-8 text-center">
                <button type="button" class="bg-green-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-green-600" onclick="prepareAndSubmitForm()">Purchase</button>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
        {{-- <script src="{{ asset('js/cart/index.js') }}"></script> --}}
        <script>
            function changeQuantity(button, delta) {
                const cartItem = button.closest('.cart-item');
                const quantityInput = cartItem.querySelector('.quantity');
                const price = parseFloat(cartItem.getAttribute('data-price'));
                const maxQuantity = parseInt(cartItem.getAttribute('data-max-quantity'));
                let quantity = parseInt(quantityInput.value);

                quantity += delta;
                if (quantity < 1) {
                    quantity = 1;
                } else if (quantity > maxQuantity) {
                    quantity = maxQuantity;
                }
                quantityInput.value = quantity;

                updateSubtotal();
            }

            function updateSubtotal() {
                let subtotal = 0;
                document.querySelectorAll('.cart-item').forEach(item => {
                    const price = parseFloat(item.getAttribute('data-price'));
                    const quantity = parseInt(item.querySelector('.quantity').value);
                    subtotal += price * quantity;
                });

                document.getElementById('subtotal').textContent = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(subtotal);
            }

            function deleteCartItem(button, url) {
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

            function prepareAndSubmitForm() {
                const form = document.getElementById('purchaseForm');
                document.querySelectorAll('.cart-item').forEach(item => {
                    const cartId = item.getAttribute('data-cart-id');
                    const quantity = item.querySelector('.quantity').value;

                    const inputCartId = document.createElement('input');
                    inputCartId.type = 'hidden';
                    inputCartId.name = `products[${cartId}][CartID]`;
                    inputCartId.value = cartId;

                    const inputQuantity = document.createElement('input');
                    inputQuantity.type = 'hidden';
                    inputQuantity.name = `products[${cartId}][Quantity]`;
                    inputQuantity.value = quantity;

                    form.appendChild(inputCartId);
                    form.appendChild(inputQuantity);
                });

                form.submit();
            }
        </script>
    @endpush
