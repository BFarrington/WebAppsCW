<!doctype html>
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/stylesheet.css')}}">
<html lang="en">
    <head>    
        <title>MugPad - @yield('title')</title>
    </head>
    <body>
        <header>
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <img src="{{ URL::asset('vectors/MugPad.svg')}}" height="100px">
            <div class="menu">
                <a href={{ route('posts')}}>Feed</a>
                <a href={{ route('home')}}>Profile</a>
                <a href=>Create</a>
            </div>
        </header>
        <section>
            @yield('content')
        </section>
    </body>
</html>