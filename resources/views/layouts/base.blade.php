<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf_token" content="{{ csrf_token() }}"/>
        <title>Base Project</title>
        {{-- Define CSS files--}}
        <link href="{{ asset('css/libraries/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/libraries/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/libraries/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/base.css') }}" rel="stylesheet">
        {{-- Define JS files--}}
        <script src="{{ asset('js/libraries/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/libraries/jquery.min.js') }}"></script>
        <script src="{{ asset('js/common/index.js') }}"></script>
        <script src="{{ asset('js/base.js') }}"></script>
        @yield('script-files')
    </head>
    <body>
        <div id="main">
            <div id="base-content">
                @yield('content')
            </div>
        </div>
        @yield('modals')
    </body>
</html>
