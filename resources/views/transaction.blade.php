@extends('components.shop-layout')
@section('title', 'Transactions')
@section('content')
<div class="container mx-auto my-5 p-5 bg-gray-100">
    @foreach($transactionHeader as $header)
        @foreach($header->transactionDetails as $detail)
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
                <img src="{{ asset($detail->product->user->ProfileImage) }}" alt="{{ $detail->product->user->StoreName }}" class="w-10 h-10 rounded-full mr-3">
                <div>
                    <p class="text-gray-700 font-bold">{{ $detail->product->user->StoreName }}</p>
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

        </div>
        @endforeach
    @endforeach
</div>
@endsection
