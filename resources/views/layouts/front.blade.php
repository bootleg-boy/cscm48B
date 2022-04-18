<!DOCTYPE html>
<html>
<head>
    <title>Micro Bloging</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous">
</script>
    <link rel="stylesheet" type="text/css" href="{{url('style.css')}}">
    @yield('header_style')
    <script src="{{ asset('js/app.js') }}" defer></script>

</head>
<body>
<div id="app">
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            Home
        </a>
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
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
    </div>
</nav>
<main class="py-4">
    @yield('content')
</main>
<div>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">This is a blog on Laravel 7</h1>
            <p class="lead">Well, I should create a new blog from scratch on Laravel 8. What am I waiting for? :)</p>
        </div>
    </div>
</div>
</div>
@yield('footer_script')
</body>
</html>

