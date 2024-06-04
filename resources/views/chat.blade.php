@extends('layout')
@section('title', 'Chat')
@section('content')
<header class="bg-[#E6F5FF] text-black p-4 flex flex-col items-center">
    <div class="flex items-center justify-between w-full">
        <div class="flex items-center space-x-4">
            <a href= {{route('HomePage')}}>
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </a>
            <span class="text-black font-bold text-xl">Chat</span>
        </div>
</header>
<div class="container mx-auto p-4 flex" style="background-color: #E6F5FF;">
    <div class="w-1/4 p-4">
        <h2 class="text-xl font-bold mb-4">Contact</h2>
        <ul id="friendList" class="mb-4">
            @foreach ($friends as $friend)
                <li class="flex items-center p-2 border rounded mb-2 cursor-pointer hover:bg-blue-100" onclick="selectFriend({{ $friend->FriendID == Auth::id() ? $friend->UserID : $friend->FriendID }}, '{{ $friend->UserID == Auth::id() ? $friend->friend->Name : $friend->user->Name }}')">
                    @if ($friend->ProfileImage)
                        <img src="$friend->ProfileImage" alt="Avatar" class="w-10 h-10 rounded-full mr-2">
                    @else
                        <img src="{{asset('Assets/DefaultProfile.png')}}" alt="img" class="w-10 h-10 rounded-full mr-2">
                    @endif
                    <div>
                        <div class="font-bold">{{ $friend->UserID == Auth::id() ? $friend->friend->Name : $friend->user->Name }}</div>
                        <div class="text-sm text-gray-600">Available</div>
                    </div>
                </li>
            @endforeach
        </ul>
        <h2 class="text-xl font-bold mb-4">Friend Requests</h2>
        <ul id="friendRequestList" class="mb-4">
            @foreach ($friendRequests as $friendRequest)
                <li class="flex items-center p-2 border rounded mb-2">
                    @if ($friendRequests->ProfileImage)
                        <img src="$friendRequests->ProfileImage" alt="Avatar" class="w-10 h-10 rounded-full mr-2">
                    @else
                        <img src="{{asset('Assets/DefaultProfile.png')}}" alt="img" class="w-10 h-10 rounded-full mr-2">
                    @endif
                    <div>
                        <div class="font-bold">{{ $friendRequest->user->Name }}</div>
                        <form action="{{ route('chat.acceptFriend', $friendRequest->FriendListID) }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded focus:outline-none focus:shadow-outline">Accept</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
        <h2 class="text-xl font-bold mb-4">Sent Friend Requests</h2>
        <ul id="sentFriendRequestList" class="mb-4">
            @foreach ($sentFriendRequests as $sentRequest)
                <li class="flex items-center p-2 border rounded mb-2">
                    @if ($sentRequest->ProfileImage)
                        <img src="$sentRequest->ProfileImage" alt="Avatar" class="w-10 h-10 rounded-full mr-2">
                    @else
                        <img src="{{asset('Assets/DefaultProfile.png')}}" alt="img" class="w-10 h-10 rounded-full mr-2">
                    @endif
                    <div class="font-bold">{{ $sentRequest->friend->Name }}</div>
                    <span class="ml-auto bg-yellow-500 text-white font-bold py-1 px-2 rounded">Pending</span>
                </li>
            @endforeach
        </ul>
        <h2 class="text-xl font-bold mb-4">Add Friend</h2>
        <form action="{{ route('chat.addFriend') }}" method="POST" class="mb-4">
            @csrf
            <div class="mb-4">
                <input type="number" name="friend_id" placeholder="Enter Friend ID" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <div class="mb-4">
                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Add Friend</button>
            </div>
        </form>
        @if (session('success'))
            <div class="bg-green-500 text-white p-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="bg-red-500 text-white p-2 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif
    </div>
    <div class="w-3/4 flex flex-col items-center p-4">
        <h1 class="text-3xl font-bold mb-4">Chat with <span id="selectedFriendName"></span></h1>
        <div id="chatBox" class="flex-grow mb-4 w-full h-64 border rounded p-4 overflow-y-scroll bg-white">
        </div>
        <form id="messageForm" class="w-full flex" action="{{ route('chat.sendMessage') }}" method="POST">
            @csrf
            <input type="hidden" id="receiverId" name="receiver_id">
            <input type="text" id="messageInput" name="message" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Send</button>
        </form>
    </div>
</div>

@push('scripts')
<script>
    let selectedFriendId = null;

    function selectFriend(friendId, friendName) {
        selectedFriendId = friendId;
        document.getElementById('receiverId').value = friendId;
        document.getElementById('selectedFriendName').innerText = friendName;
        fetchMessages(friendId);
    }

    function fetchMessages(friendId) {
        fetch(`/chat/messages/${friendId}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(messages => {
                const chatBox = document.getElementById('chatBox');
                chatBox.innerHTML = '';
                messages.forEach(message => {
                    const messageElement = document.createElement('div');
                    messageElement.className = 'p-2 border rounded mb-2 ' + (message.SenderID == {{ Auth::id() }} ? 'bg-blue-100 text-right' : 'bg-gray-100 text-left');
                    messageElement.innerHTML = '<strong>' + (message.SenderID == {{ Auth::id() }} ? 'You' : message.sender.Name) + ':</strong> ' + message.message;
                    chatBox.appendChild(messageElement);
                });
                chatBox.scrollTop = chatBox.scrollHeight;
            })
            .catch(error => {
                console.error('Error fetching messages:', error);
            });
    }

    document.getElementById('messageForm').addEventListener('submit', function(event) {
        event.preventDefault();
        const form = event.target;
        const formData = new FormData(form);
        fetch(form.action, {
            method: 'POST',
            body: formData,
        }).then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            form.reset();
            fetchMessages(selectedFriendId);
        })
        .catch(error => {
            console.error('Error sending message:', error);
        });
        refreshChat();
        document.getElementById('messageInput').value = "";
    });

    function refreshChat() {
        if (selectedFriendId) {
            fetchMessages(selectedFriendId);
        }
    }
</script>
@endpush
@endsection