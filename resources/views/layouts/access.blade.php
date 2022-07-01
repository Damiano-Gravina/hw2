<html>
    <head>
        <title>String @yield('title')</title>

        <link rel="stylesheet" href="{{ asset('css/login_register.css') }}">


        <meta name="viewport" content="width=device width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}"> 
        @yield('script')
    </head>


    <body>
        @yield('error')

        <article>
            <section id="register">
            <div>
                <div id="icon">🦊String</div>
                <div id="description">Buy and sell music tools</div>
            </div>

            @yield('form')

            </section>
        </article>

    </body>
</html>