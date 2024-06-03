@extends('layout')
@section('title', 'Top Up')
@section('content')
<div class="container mx-auto p-4 flex flex-col">
    <div class="flex justify-center w-full h-full">
        <div class="w-11/12 flex justify-center space-x-4 flex-row">
            <div>
                Testing
            </div>
            <div class="container mx-auto p-4">
                <h1 class="text-2xl font-bold mb-4">Top-Up Balance</h1>

                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">{{ session('success') }}</strong>
                    </div>
                @endif

                <form action="{{ route('topup.process') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="amount" class="block text-gray-700 text-sm font-bold mb-2">Amount:</label>
                        <input type="number" name="amount" id="amount" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                    <div class="mb-4">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Top Up</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
