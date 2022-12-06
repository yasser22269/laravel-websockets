<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/helper.css')}}">
    <link rel="stylesheet" href="{{asset('css/ws.css')}}">
</head>
<body>
<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
    @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
                <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
            @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                @endif
            @endauth
        </div>
    @endif
</div>
<main class="d-flex align-center h-100vh">



    <section id="section-chat" class="d-flex flex-col justify-between align-center card mx-auto h-80 ">

        <nav id="nav-online" class="w-100 d-flex">

            <h3 class="white pl-1">Chat</h3>

            <div id="avatars">

                {{--                avatar --}}
                {{--                <span class="avatar">AL</span>--}}
                {{--                <span class="avatar">AB</span>--}}
                {{--                <span class="avatar">AC</span>--}}
            </div>


        </nav>


        <ul id="list-messages" class="px-1 d-flex flex-col">
        </ul>

        <form id="form" class="w-100 d-flex flex-col">

            <span class="pl-1" id="span-typing"></span>
            {{--            <label for="input-message">Message:</label>--}}
            <input
                id="input-message"
                class="py-2 pl-1"
                placeholder="Type a message"
                type="text">
        </form>

    </section>

</main>

<script src="{{ asset('js/app.js') }}" defer></script>

</body>
</html>
