<!doctype html>

<html lang="en">
    <head>    
        <title>MugPad - @yield('title')</title>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/stylesheet.css')}}">
    </head>
    <body>
        <header>
            <img src="{{ URL::asset('vectors/MugPad.svg')}}" height="100px">
            <section class="menu">
                <a href={{ route('posts')}}>Feed</a>
                <a href=>Profile</a>
                <a href=>Create</a>
            </section>
        </header>
        <section>
            @yield('content')
        </section>
    </body>
</html>