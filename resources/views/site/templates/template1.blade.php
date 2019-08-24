<html>
    <head>
        <title>{{$title or 'Curso de Laravel 5.3'}}</title>
    </head>
        <body>
            @yield('content')

            @stack('script')
        </body>
</html>