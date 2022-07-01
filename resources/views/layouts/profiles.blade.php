<html>
    <head>
        <title>String @yield('title')</title>
        @yield('header')
        
        <meta name="viewport" content="width=device width, initial-scale=1">
    </head>

    <body>
        <div id = "header">
            <div id="icon">🦊</div>
            <a href="{{route('home')}}">Home</a>
            <a href="{{route('newPost')}}">Nuovo annuncio</a>
        </div>

        @yield('content')
    </body>
</html>