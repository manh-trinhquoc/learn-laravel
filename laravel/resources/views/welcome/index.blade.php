<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Welcome to HackerPair</title>
</head>

<body>
    <h1>
        Welcome to HackerPair 2
    </h1>
    <p>
        <a href="{{ route('events.show', ['event' => 42]) }}" title="Laravel Hacking and Coffee">Laravel Hacking and Coffee </a>
    </p>
    <p>

        @auth
        Welcome back, {{ Auth::user()->name }}!
        @else
        Hello, stranger! <a href="{{ route('login') }}">Login</a>
        or <a href="{{ route('register') }}">Register</a>.
        @endauth
    </p>
    <p>

        @if (Auth::check())
        Welcome back 2, {{ Auth::user()->name }}!
        @else
        Hello, stranger 2! <a href="{{ route('login') }}">Login</a>
        or <a href="{{ route('register') }}">Register</a>.
        @endif
    </p>


</body>

</html>
