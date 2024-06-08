@extends('components.layout')
@section('title', 'Top Up')
@section('content')

<div class="container mx-auto p-4">
    <div class="flex">
        <div class="w-1/2 p-10">
            <h2 class="text-lg font-bold mb-4">Select Method</h2>
            <div id="methodList">
                <div class="p-2 border rounded mb-2 cursor-pointer flex items-center" onclick="selectMethod('bca')">
                    <div class="flex flex-row items-center">
                        <img src="{{ asset('Assets/TopUp/bca.jpg') }}" alt="BCA OneKlik" class="h-6 w-6 mr-2">
                        <span>BCA</span>
                    </div>
                    <div>
                        <span id="bcaActive" class="ml-2 text-sm text-blue-500 hidden">Active</span>
                    </div>
                </div>
                <div class="p-2 border rounded mb-2 cursor-pointer flex items-center" onclick="selectMethod('mandiri')">
                    <div class="flex flex-row items-center">
                        <img src="{{ asset('Assets/TopUp/mandiri.png') }}" alt="Mandiri" class="h-6 w-6 mr-2 rounded">
                        <span>Mandiri</span>
                    </div>
                    <div>
                        <span id="mandiriActive" class="ml-2 text-sm text-blue-500 hidden">Active</span>
                    </div>
                </div>
                <div class="p-2 border rounded mb-2 cursor-pointer flex items-center" onclick="selectMethod('debit')">
                    <div class="flex flex-row items-center">
                        <img src="{{ asset('Assets/TopUp/visa.png') }}" alt="Debit Visa / Mastercard" class="h-6 w-6 mr-2">
                        <span>Debit Visa / Mastercard</span>
                    </div>
                    <div>
                        <span id="debitActive" class="ml-2 text-sm text-blue-500 hidden">Active</span>
                    </div>
                </div>
                <div class="p-2 border rounded mb-2 cursor-pointer flex items-center" onclick="selectMethod('qris')">
                    <div class="flex flex-row items-center">
                        <img src="{{ asset('Assets/TopUp/qris.png') }}" alt="QRIS" class="h-6 w-6 mr-2">
                        <span>QRIS</span>
                    </div>
                    <div>
                        <span id="qrisActive" class="ml-2 text-sm text-blue-500 hidden">Active</span>
                    </div>
                </div>
                <div class="p-2 border rounded mb-2 cursor-pointer flex items-center" onclick="selectMethod('ovo')">
                    <div class="flex flex-row items-center">
                        <img src="{{ asset('Assets/TopUp/ovo.png') }}" alt="OVO" class="h-6 w-6 mr-2 rounded">
                        <span>OVO</span>
                    </div>
                    <div>
                        <span id="ovoActive" class="ml-2 text-sm text-blue-500 hidden">Active</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-1/2 flex flex-col items-center p-10">
            <div id="methodLogo" class="mb-4 flex justify-center">
                <img id="methodImage" src="{{ asset('Assets/bca_logo.png') }}" alt="BCA Logo" class="w-1/2 rounded-xl">
            </div>
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative w-full mb-5" role="alert">
                    <strong class="font-bold">{{ session('success') }}</strong>
                </div>
            @endif

            @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative w-full mb-5" role="alert">
                    <strong class="font-bold">{{ session('error') }}</strong>
                </div>
            @endif
            <form action="{{ route('topup.process') }}" method="POST" class="w-full">
                @csrf
                <div class="mb-4">
                    <label for="amount" class="block text-gray-700 text-sm font-bold mb-2">Amount:</label>
                    <input type="number" name="amount" id="amount" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <div class="mb-4">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full">Top Up</button>
                </div>
            </form>
        </div>
    </div>
    <div class="mt-0 m-10">
        <h2 class="text-lg font-bold mb-2">Detail</h2>
        <div id="paymentDetails" class="p-4 border rounded">
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function selectMethod(method) {
        const methods = ['bca', 'mandiri', 'debit', 'qris', 'ovo'];
        const methodLogos = {
            'bca': "{{ asset('Assets/TopUp/bca1.png') }}",
            'mandiri': "{{ asset('Assets/TopUp/mandiri1.png') }}",
            'debit': "{{ asset('Assets/TopUp/visa1.png') }}",
            'qris': "{{ asset('Assets/TopUp/qris1.png') }}",
            'ovo': "{{ asset('Assets/TopUp/ovo1.jpg') }}"
        };
        const methodDetails = {
            'bca': `
                <p>1. Open your BCA mobile app.</p>
                <p>2. Select OneKlik and choose your linked account.</p>
                <p>3. Confirm the payment details and authorize the transaction.</p>
            `,
            'mandiri': `
                <p>1. Open your Mandiri mobile app.</p>
                <p>2. Select Transfer and choose your linked account.</p>
                <p>3. Enter the payment details and confirm the transaction.</p>
            `,
            'debit': `
                <p>1. Enter your Debit Visa / Mastercard details.</p>
                <p>2. Confirm the payment amount and authorize the transaction.</p>
                <p>3. Wait for the confirmation message.</p>
            `,
            'qris': `
                <p>1. Open your mobile banking app and select QRIS.</p>
                <p>2. Scan the QR code displayed on the screen.</p>
                <p>3. Confirm the payment details and authorize the transaction.</p>
            `,
            'ovo': `
                <p>1. Open your OVO app.</p>
                <p>2. Select the top-up option and choose your linked account.</p>
                <p>3. Enter the payment amount and confirm the transaction.</p>
            `
        };

        methods.forEach(m => {
            document.getElementById(m + 'Active').classList.add('hidden');
        });

        document.getElementById(method + 'Active').classList.remove('hidden');
        document.getElementById('methodImage').src = methodLogos[method];
        document.getElementById('paymentDetails').innerHTML = methodDetails[method];
    }
    selectMethod('bca');
</script>
@endpush
