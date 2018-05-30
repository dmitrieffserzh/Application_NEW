<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
{{--<meta name="theme-color" content="#111"/>--}}

<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@stack('custom-styles')

<!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/components/main_menu.js') }}"></script>
    @stack('custom-scripts')
</head>
<body class="body">

<header class="header">
    <nav class="navbar navbar-expand-md fixed-top navbar-light bg-white shadow">
        <div class="container">
            <span class="navbar-brand mb-0 h1"  style="font-weight:900;">LOGO</span>

            <button type="button" class="main-menu__button">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
    </nav>
    <div class="container">
        {{--<div class="logo">LOGO</div>--}}
        {{--<div id="menu-container" class="menu-container">--}}
        {{--@if (!Auth::guest())--}}
        {{--<div class="user-top-widget">--}}
        {{--<div class="user-top-widget__background" style="--}}
        {{--background: url('{{ getImage('thumbnail', Auth::user()->profile->avatar ) }}') no-repeat center center;--}}
        {{--background-size: cover;--}}
        {{--"></div>--}}
        {{--<div class="user-top-widget__avatar">--}}
        {{--<img src="{{ getImage('thumbnail', Auth::user()->profile->avatar ) }}"--}}
        {{--alt="{{ Auth::user()->nickname }}">--}}

        {{--@if(Auth::user()->isOnline())--}}
        {{--<span class="status status--online"></span>--}}
        {{--@else--}}
        {{--<span class="status status--offline"></span>--}}
        {{--@endif--}}

        {{--</div>--}}
        {{--<div class="user-top-widget__name">--}}
        {{--{{ Auth::user()->nickname }}--}}
        {{--</div>--}}

        {{--</div>--}}
        {{--@endif--}}
        {{--<nav class="main-menu">--}}
        {{--<ul class="main-menu__list">--}}
        {{--@if (!Auth::guest())--}}
        {{--<li class="main-menu__item"><a href="#" class="main-menu__link">Menu item</a></li>--}}
        {{--<li class="main-menu__item"><a href="#" class="main-menu__link">Menu item</a></li>--}}
        {{--<li class="main-menu__item"><a href="#" class="main-menu__link">Menu item</a></li>--}}
        {{--<li class="main-menu__item"><a href="#" class="main-menu__link">Menu item</a></li>--}}
        {{--<li class="main-menu__item"><a href="#" class="main-menu__link">Menu item</a></li>--}}
        {{--<li class="main-menu__item"><a href="#" class="main-menu__link">Menu item</a></li>--}}
        {{--<li class="main-menu__item"><a href="#" class="main-menu__link">Menu item</a></li>--}}
        {{--<li class="main-menu__item"><a href="{{ route('users.list') }}" class="main-menu__link">Пользователи</a>--}}
        {{--</li>--}}
        {{--<li class="main-menu__item"><a href="{{ route('posts.index') }}"--}}
        {{--class="main-menu__link">Посты</a></li>--}}
        {{--@endif--}}
        {{--<!-- Authentication Links -->--}}
        {{--@if (Auth::guest())--}}
        {{--<li class="main-menu__item"><a href="{{ route('login') }}" class="ajax-modal main-menu__link" data-toggle="modal" data-url="{{ route('login') }}" data-name="Войти" data-modal-size="modal-sm">Войти</a>--}}
        {{--</li>--}}
        {{--<li class="main-menu__item"><a href="{{ route('register') }}" class="main-menu__link">Регистрация</a>--}}
        {{--</li>--}}
        {{--@else--}}
        {{--<li class="main-menu__item">--}}
        {{--<a href="{{ route('users.profile', Auth::id()) }}">--}}
        {{--{{ Auth::user()->nickname }}--}}
        {{--</a></li>--}}

        {{--<li class="main-menu__item">--}}
        {{--<a href="{{ route('logout') }}"--}}
        {{--onclick="event.preventDefault();--}}
        {{--document.getElementById('logout-form').submit();" class="main-menu__link">--}}
        {{--Выйти--}}
        {{--</a>--}}

        {{--<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
        {{--{{ csrf_field() }}--}}
        {{--</form>--}}
        {{--</li>--}}

        {{--@endif--}}
        {{--</ul>--}}
        {{--</nav>--}}
        {{--</div>--}}
        {{--<button type="button" class="main-menu__button">--}}
        {{--<span class="icon-bar"></span>--}}
        {{--<span class="icon-bar"></span>--}}
        {{--<span class="icon-bar"></span>--}}
        {{--</button>--}}
        {{--<div class="splash"></div>--}}
    </div>
</header>

<div class="container">
    <div class="row">
        @yield('content')
        @yield('aside')

    </div>
</div>

{{-- footer --}}
<footer class="footer">

</footer>

{{-- Modal --}}
<div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document"></div>
</div>

</body>
</html>
