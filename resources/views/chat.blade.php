@extends('layout')
@extends('title')
@section('chat_content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
</head>
<body>
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

    <!--
        Notes:
        Kalau person-1 di-click, right-column-chat akan muncul di sebelah kanan left-column-chat

        File ini perlu JS biar right-column-chat dijadikan semacam pop-up
     -->

    <div class="right-column-chat">

    </div>
</body>
</html>
@endsection