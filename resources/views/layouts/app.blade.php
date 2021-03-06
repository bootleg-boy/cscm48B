<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Micro Blog</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous">
</script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('header_style')
    <style>
    .custom-backgroud {
        
    }
    
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Home
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @if( isset(Auth::user()->role) && Auth::user()->role == 'admin')
        <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('posts') }}">{{ __('Posts') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('post.create') }}">{{ __('New post') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('comments') }}">{{ __('Comments') }}</a>
                        </li>
                    </ul>
        @else
        <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user_posts') }}">{{ __('My Posts') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user_post.create') }}">{{ __('New post') }}</a>
                        </li>
                        
        </ul>
        @endif

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

                        <li class="nav-item">
                        <span class="badge badge-pill badge-primary" style="float:right;margin-bottom:-10px;">{{Auth::user()->notification_count}}</span> <!-- your badge -->
                            <a class="nav-link" href="{{route('post.notification')}}">Notifications </a>
                        </li>

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
        @if(Session::has('error_message'))
        <div class="container">
        <div class="row">
        <div class="col-md-12">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ Session::get('error_message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
            </div>
        </div>
        </div>
            @elseif(Session::has('success_message'))
            <div class="container">
        <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('success_message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
            </div>
        </div>
        </div>
        </div>
            @endif
            <div class="custom-backgroud">
            @yield('content')
            </div>
        </main>
    </div>
    @yield('footer_script')
    <iframe src="https://free.timeanddate.com/clock/i8alifos/n1894/fn6/fs16/fc9ff/tc000/ftb/bas2/bat1/bacfff/pa8/tt0/tw1/th1/ta1/tb4" frameborder="0" width="206" height="58"></iframe>
    <!-- Footer -->
<footer class="text-center fixed-bottom text-lg-start bg-light text-muted">
  <!-- Copyright -->
  <div class="text-center " style="background-color: rgba(0, 0, 0, 0.05);">
    ?? 2022 Copyright:
    <a class="text-reset fw-bold" href="">Micro Blog</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->
</body>
</html>
