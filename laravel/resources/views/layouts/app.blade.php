<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', '') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="{{ $classBody }}">
    <div id="app">
        @section('partials._navbar')
        <div>
            @hasSection('partials._navbar')
            @else
            @include('partials._navbar')
            @endif
        </div>
        @show
        @section('partials._jumbotron')
        <div>
            @hasSection('partials._jumbotron')
            @else
            @include('partials._jumbotron')
            @endif
        </div>
        @show
        <main class="container g-custom">
            @include('flash::message')
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @yield('content')
        </main>
    </div>
    @section('partials._footer')
    <div>
        @hasSection('partials._footer')
        @else
        @include('partials._footer')
        @endif
    </div>
    @show
</body>

</html>
