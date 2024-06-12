<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat with Admin</title>
    <link rel="shortcut icon" href="./assets/images/fav.png" type="image/svg+xml">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style-wild.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style_tournament.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        .chat-container {
            margin: 100px auto;
            max-width: 800px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
        }
        .chat-messages {
            overflow-y: scroll;
            max-height: 400px;
        }
        .chat-input {
            margin-top: 20px;
        }
    </style>
    <!-- Page-Revealer -->
    <link rel="stylesheet" href="{{asset('assetsmigrate/css/main.css')}}">
    <script src="{{asset('assetsmigrate/js/tg-page-head.js')}}"></script>
</head>
<body id="top">

@extends('spatial.navbar')

<div class="chat-container">
    <h2>Chat with Admin</h2>
    <div class="chat-messages">
        <!-- Chat messages will be displayed here -->
        <div class="message">Admin: Hello! How can I help you?</div>
        <div class="message">You: I have a question about...</div>
        <!-- Example messages, replace with dynamic content -->
    </div>
    <form class="chat-input">
        <input type="text" placeholder="Type your message...">
        <button type="submit">Send</button>
    </form>
</div>

@extends('spatial.footer')

<script src="{{asset('assets/js/script.js')}}"></script>
<script src="{{asset('assets/js/script_tournament.js')}}"></script>

<script>
    @if($message = Session::get('success'))
    Swal.fire({
        icon: "success",
        title: "Berhasil",
        text: "{{$message}}",
    });
    @endif
</script>
</body>
</html>
