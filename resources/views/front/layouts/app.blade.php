<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
       @include('front.partials.head')
    </head>
    <body class="font-sans antialiased">
        @inertia
        @yield('content')
        @stack('extra_js')
    </body>
</html>
