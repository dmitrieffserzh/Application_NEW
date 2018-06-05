<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{--<meta name="theme-color" content="#111"/>--}}

        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/components/likes.css') }}" rel="stylesheet">
        <link href="{{ asset('css/components/views.css') }}" rel="stylesheet">
        <link href="{{ asset('css/components/comments.css') }}" rel="stylesheet">
        @stack('custom-styles')

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/components/likes.js') }}"></script>
        @stack('custom-scripts')
        @yield('scripts')
    </head>
    <body class="body">

        {{-- HEADER --}}

        @include('layouts.header.header')

        <div class="container bg-white rounded shadow ow-h">
            <div class="row">
                @yield('content')

                @yield('aside')
            </div>
        </div>

        {{-- FOOTER --}}
        @include('layouts.footer.footer')

        {{-- MODAL --}}
        <div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document"></div>
        </div>

    </body>
</html>