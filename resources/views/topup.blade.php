@extends('layout')

@section('content')
<div class="container mx-auto p-4 flex">
    <div class="w-1/3">
        <h2 class="text-lg font-bold mb-4">Select Method</h2>
        <div id="methodList">
            <div class="p-2 border rounded mb-2 cursor-pointer" onclick="selectMethod('bca')">
                <span>BCA OneKlik</span>
                <span id="bcaActive" class="ml-2 text-sm text-blue-500 hidden">Active</span>
            </div>
            <div class="p-2 border rounded mb-2 cursor-pointer" onclick="selectMethod('betamart')">
                <span>Betamart</span>
                <span id="betamartActive" class="ml-2 text-sm text-blue-500 hidden">Active</span>
            </div>
            <div class="p-2 border rounded mb-2 cursor-pointer" onclick="selectMethod('konohamart')">
                <span>Konohamart</span>
                <span id="konohamartActive" class="ml-2 text-sm text-blue-500 hidden">Active</span>
            </div>
            <div class="p-2 border rounded mb-2 cursor-pointer" onclick="selectMethod('debit')">
                <span>Debit Visa / Mastercard</span>
                <span id="debitActive" class="ml-2 text-sm text-blue-500 hidden">Active</span>
            </div>
            <div class="p-2 border rounded mb-2 cursor-pointer" onclick="selectMethod('mobilebanking')">
                <span>Mobile Banking</span>
                <span id="mobilebankingActive" class="ml-2 text-sm text-blue-500 hidden">Active</span>
            </div>
        </div>
    </div>
    <div class="w-2/3 flex flex-col items-center">
        <h1 class="text-3xl font-bold mb-4">Top-Up Balance</h1>
        <div id="methodLogo" class="mb-4">
            <img id="methodImage" src="{{ asset('Assets/bca_logo.png') }}" alt="BCA Logo" class="h-16">
        </div>
        <form action="{{ route('topup.process') }}" method="POST" class="w-1/2">
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
@endsection

@push('scripts')
<script>
    function selectMethod(method) {
        const methods = ['bca', 'betamart', 'konohamart', 'debit', 'mobilebanking'];
        const methodLogos = {
            'bca': "{{ asset('Assets/TestImg.jpg') }}",
            'betamart': "{{ asset('Assets/TestImg1.jpg') }}",
            'konohamart': "{{ asset('Assets/konohamart_logo.png') }}",
            'debit': "{{ asset('Assets/debit_logo.png') }}",
            'mobilebanking': "{{ asset('Assets/mobilebanking_logo.png') }}"
        };

        methods.forEach(m => {
            document.getElementById(m + 'Active').classList.add('hidden');
        });

        document.getElementById(method + 'Active').classList.remove('hidden');
        document.getElementById('methodImage').src = methodLogos[method];
    }
</script>
@endpush
