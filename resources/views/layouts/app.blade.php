<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @yield('css')
    @yield('js')
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    @auth()
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <span class="badge badge-info" id="notifications-badge">
                                    {{ auth()->user()->unreadNotifications->count()}}
                                    Unread Notifications
                                </span>
                            </a>


                        </li>
                    @endauth
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    {{--     If the user not in the paths of login register forgot password then show him the nav bar, else don't show it--}}
    @if(!in_array(request()->path(),['login','register','password/email','password/reset']))
        <main class="container py-4">
            <div class="row">
                <div class="col-md-4">
                    @auth
                        <a href="{{route('discussions.create')}}" id="add-discussion-btn" class="btn btn-info my-2">Add
                            Discussion</a>
                    @else
                        <a href="{{route('login')}}" id="add-discussion-btn" class="btn btn-info my-2">Sign in To Add
                            Discussion</a>
                    @endauth
                    <div class="card">
                        <div class="card-header">
                            Channels
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach($channels as $channel)
                                <li class="list-group-item">
                                    {{$channel->name}}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-md-8">
                    @yield('content')
                </div>
            </div>
        </main>
    @else
        <main class="py-4">
            @yield('content')
        </main>
    @endif
</div>
</body>
</html>
