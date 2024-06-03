@extends('layout')

@section('title', 'Chat')

@section('content')
<header>
    <div class="left"> 
        <div id="backButton"></div>
        <h2>Chat</h2>
    </div>
    <div class="right">
        <div id="notifButton"></div>
        <div id="profileButton"></div>
    </div>
</header>

<div class="left-column-chat">
    <div class="contact"><img src="" alt="" id="callIcon"> Contact</div>
    <div class="lists-contact">
        <div class="person-1">
            <img src="" alt="" id="profileImage">
            <a href="">Zenosite</a>
            <div id="status">Available</div>
        </div>
    </div>
</div>

<div class="right-column-chat">
    <div class="header-chat">
        <img src="" alt="" id="profileImage">
        <a href="">Zenosite</a>
    </div>

    <div class="chat-bar">
        <button id="addFileButton">+</button>
        <button id="emoticonButton">Emoticon</button>
        <input type="text">
        <button id="sendButton">Send</button>
    </div>
</div>
@endsection
