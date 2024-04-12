<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title', 'Title')</title>
    </head>
    <body>
        <div id="root">
            @yield('content')
        </div>
    </body>
</html>