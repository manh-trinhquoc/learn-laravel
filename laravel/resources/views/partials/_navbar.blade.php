<nav class="navbar navbar-expand-lg navbar-dark navbar-custom navbar-static-top" style="background-color: rgb(13, 33, 51);">
    <div class="container">
        <a href="{{ url('/') }}" class="logo">
            {{ config('app.name') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link navbar-text" href="{{ route('events.index') }}">{{ __('Events') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link navbar-text" href="{{ route('locations.index') }}">{{ __('Locations') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link navbar-text" href="{{ route('categories.index') }}">{{ __('Categories') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link navbar-text" href="{{ route('about.index') }}">{{ __('About') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link navbar-text" href="{{ route('contact.create') }}">{{ __('Contact Us') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link navbar-text" href="{{ route('about.book') }}">{{ __('The book') }}</a>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link navbar-text" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @endif

                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link navbar-text" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link navbar-text dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false" v-pre>
                        <span>Hi, </span> <span>{{ Auth::user()->first_name }}</span>
                    </a>

                    <ul class="dropdown-menu " aria-labelledby="navbarDropdown">
                        <li><a href="http://hackerpair.com/admin/users/154/edit" class="dropdown-item">Account Profile</a></li>
                        <li><a href="http://hackerpair.com/favorites" class="dropdown-item">Favorited Events</a></li>
                        <li><a href="http://hackerpair.com/users/154/upcoming" class="dropdown-item">Upcoming Events</a></li>
                        <li><a href="http://hackerpair.com/users/154/hosted" class="dropdown-item">Hosted Events</a></li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>

                    </ul>
                </li>
                <li class="nav-item"><a href="http://hackerpair.com/users/154/hosted/create" class="nav-link">Post Event</a></li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
