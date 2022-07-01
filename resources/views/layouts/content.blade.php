<html>
    <head>
    <title>String @yield('title')</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        @yield('header')

        <meta name="viewport" content="width=device width, initial-scale=1">
    </head>

    <body>
        
    @yield('top')

    @yield('playlist')

        <a href="{{route('newPost')}}" id = "new_sale"> 🎵 Crea un annuncio  </a> 

        <main>
        </main>

        <footer>
            <span>Sei uno shop e vuoi farlo sapere a tutti? contatta lo staff: string.staff@gmail.com</span>
            <span>Developed By: Damiano Gravina (1000011319)</span>
        </footer>
    </body>

    
</html>