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
</body>
</html>
@endsection