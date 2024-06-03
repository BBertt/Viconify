@extends('layout')

@section('content')
<div class="container mx-auto p-4 flex">
    <div class="w-1/3">
        <h2 class="text-lg font-bold mb-4">Friends</h2>
        <ul id="friendList">
            @foreach ($friends as $friend)
                <li class="p-2 border rounded mb-2 cursor-pointer" onclick="selectFriend({{ $friend->FriendListID }}, '{{ $friend->friend->Name }}')">
                    {{ $friend->friend->Name }}
                </li>
            @endforeach
        </ul>
        <h2 class="text-lg font-bold mb-4">Add Friend</h2>
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
    <div class="w-2/3 flex flex-col items-center">
        <h1 class="text-3xl font-bold mb-4">Chat with <span id="selectedFriendName"></span></h1>
        <div id="chatBox" class="mb-4 w-full h-64 border rounded p-4 overflow-y-scroll">
            <!-- Messages will be displayed here -->
        </div>
        <form id="messageForm" class="w-full flex">
            <input type="hidden" id="friendListId" name="friend_list_id">
            <input type="text" id="messageInput" name="message" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Send</button>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function selectFriend(friendListId, friendName) {
        document.getElementById('friendListId').value = friendListId;
        document.getElementById('selectedFriendName').innerText = friendName;
        fetchMessages(friendListId);
    }

    function fetchMessages(friendListId) {
        fetch(`/chat/messages?friend_list_id=${friendListId}`)
            .then(response => response.json())
            .then(messages => {
                const chatBox = document.getElementById('chatBox');
                chatBox.innerHTML = '';
                messages.forEach(message => {
                    const messageElement = document.createElement('div');
                    messageElement.className = 'p-2 border rounded mb-2';
                    messageElement.innerText = `${message.sender.Name}: ${message.Message}`;
                    chatBox.appendChild(messageElement);
                });
            });
    }

    document.getElementById('messageForm').addEventListener('submit', function(event) {
        event.preventDefault();
        const friendListId = document.getElementById('friendListId').value;
        const messageInput = document.getElementById('messageInput');
        const message = messageInput.value;

        fetch('{{ route("chat.sendMessage") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                friend_list_id: friendListId,
                message: message
            })
        })
        .then(response => response.json())
        .then(newMessage => {
            const chatBox = document.getElementById('chatBox');
            const messageElement = document.createElement('div');
            messageElement.className = 'p-2 border rounded mb-2';
            messageElement.innerText = `${newMessage.sender.Name}: ${newMessage.Message}`;
            chatBox.appendChild(messageElement);
            messageInput.value = '';
        });
    });
</script>
@endpush
