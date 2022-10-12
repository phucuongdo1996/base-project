<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf_token" content="{{ csrf_token() }}"/>

        <title>Fast Accounting CRM</title>

        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <script src="{{ asset('js/popper.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/toastr.min.js') }}"></script>
        <script src="{{ asset('js/select2.min.js') }}"></script>
        <script src="{{ asset('js/cleave/cleave.min.js') }}"></script>
        <script src="{{ asset('js/cleave/cleave-phone.jp.js') }}"></script>
        <script src="{{ asset('js/base/index.js') }}"></script>
        <script src="{{ asset('js/app.js') }}"></script>
    </head>
    <body>
        <div id="main">
            @include('layouts.header')
            @include('layouts.sidebar')
            <div id="base-content">
                <div id="breadcrumb">
                    @yield('breadcrumb')
                </div>
                @yield('content')
            </div>
        </div>
        @yield('modals')
    </body>
    <script>
        toastr.options.progressBar = true;
        @if (Session::has(ERROR_FLASH))
        toastr.error('{{ Session::get(ERROR_FLASH) }}')
        @elseif(Session::has(SUCCESS_FLASH))
        toastr.success('{{ Session::get(SUCCESS_FLASH) }}')
        @endif
    </script>
</html>
