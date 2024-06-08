@extends('components.layout')

@section('title', 'Register Shop')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Register Your Shop</h1>
    <form action="{{ route('shop.register.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="StoreName" class="block text-gray-700 font-bold mb-2">Store Name</label>
            <input type="text" name="StoreName" id="StoreName" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            @error('StoreName')
                <p class="text-xs text-red-500">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="StoreDescription" class="block text-gray-700 font-bold mb-2">Store Description</label>
            <textarea name="StoreDescription" id="StoreDescription" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
            @error('StoreDescription')
                <p class="text-xs text-red-500">{{$message}}</p>
            @enderror
        </div>

        {{-- <div class="mb-4">
            <label for="StoreStatus" class="block text-gray-700 font-bold mb-2">Store Status</label>
            <select name="StoreStatus" id="StoreStatus" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                <option value="open">Open</option>
                <option value="closed">Closed</option>
            </select>
        </div> --}}

        <div class="mb-4">
            <label for="StoreStartTime" class="block text-gray-700 font-bold mb-2">Store Start Time</label>
            <input type="time" name="StoreStartTime" id="StoreStartTime" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            @error('StoreStartTime')
                <p class="text-xs text-red-500">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="StoreEndTime" class="block text-gray-700 font-bold mb-2">Store End Time</label>
            <input type="time" name="StoreEndTime" id="StoreEndTime" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            @error('StoreEndTime')
                <p class="text-xs text-red-500">{{$message}}</p>
            @enderror
        </div>

        {{-- <div class="mb-4">
            <label for="StoreDeliveryTime" class="block text-gray-700 font-bold mb-2">Store Delivery Time</label>
            <input type="time" name="StoreDeliveryTime" id="StoreDeliveryTime" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div> --}}

        <div class="flex items-center justify-center">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Register
            </button>
        </div>
    </form>
</div>
@endsection