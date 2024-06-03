@extends('layout')

@section('title', 'Chat')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body class="bg-gray-100 h-screen antialiased leading-none">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-1/4 bg-white border-r border-gray-200 p-4">
            <header class="flex justify-between items-center mb-4">
                <div class="flex items-center">
                    <h2 class="ml-4 text-lg font-semibold">Chat</h2>
                </div>
                <div class="flex items-center">
                    <button id="notifButton" class="text-gray-600 hover:text-gray-800 mr-4"><i class="fas fa-bell"></i></button>
                    <button id="profileButton" class="text-gray-600 hover:text-gray-800"><i class="fas fa-user-circle"></i></button>
                </div>
            </header>
            <div>
                <div class="flex items-center mb-4">
                    <img src="" alt="" id="callIcon" class="h-6 w-6 mr-2">
                    <span class="text-gray-700 font-semibold">Contact</span>
                </div>
                <div class="lists-contact">
                    <div class="person flex items-center p-2 hover:bg-gray-100 cursor-pointer">
                        <img src="" alt="" id="profileImage" class="h-10 w-10 rounded-full mr-2">
                        <div>
                            <a href="#" class="text-gray-800 font-semibold">Zenosite</a>
                            <div class="text-sm text-green-500">Available</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Chat area -->
        <div class="w-3/4 flex flex-col">
            <div class="header-chat flex items-center bg-white border-b border-gray-200 p-4">
                <img src="" alt="" id="profileImage" class="h-10 w-10 rounded-full mr-2">
                <a href="#" class="text-gray-800 font-semibold">Zenosite</a>
            </div>
            <div class="flex-1 flex flex-col items-center justify-center bg-gray-100 p-4">
                <div class="text-center">
                    <img src="path/to/placeholder-image.png" alt="Chat Placeholder" class="mx-auto mb-4">
                    <p class="text-gray-600">To begin, select one of the conversations on the left.</p>
                </div>
            </div>
            <div class="chat-bar flex items-center bg-white border-t border-gray-200 p-4">
                <button id="addFileButton" class="text-gray-600 hover:text-gray-800 mr-2">+</button>
                <button id="emoticonButton" class="text-gray-600 hover:text-gray-800 mr-2">😊</button>
                <input type="text" class="flex-1 border border-gray-300 rounded-full px-4 py-2 mr-2" placeholder="Type a message">
                <button id="sendButton" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-full">Send</button>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/chat.js') }}"></script>
</body>
</html>
@endsection
