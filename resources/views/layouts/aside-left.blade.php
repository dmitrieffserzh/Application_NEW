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

<header class="header fixed-top">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow">
        <div class="container">
            <a href="{{ route('home') }}" class="navbar-brand mb-0 h1 d-inline-block" style="font-weight:900;">LOGO</a>

            <ul class="main-menu d-none d-md-block">
                <li class="main-menu__item{{ is_active('news.*') }}">
                    <a href="{{ route('news.index') }}" class="main-menu__link">Новости</a>
                </li>
                <li class="main-menu__item{{ is_active('stories.*') }}">
                    <a href="{{ route('stories.index') }}" class="main-menu__link">Истории</a>
                </li>
                <li class="main-menu__item{{ is_active('users.*') }}">
                    <a href="{{ route('users.list') }}" class="main-menu__link">Пользователи</a>
                </li>
            </ul>

            <span class="d-inline-block position-relative">
                @if(Auth::guest())
                    <a href="{{ route('login') }}" class="ajax-modal main-menu__link" data-toggle="modal" data-url="{{ route('login') }}" data-name="Войти" data-modal-size="modal-sm">Войти</a>
                @else

                    <a class="text-white" href="{{ route('users.profile', Auth::user()->id) }}"
                       title="{{ Auth::user()->nickname }}">{{ Auth::user()->nickname }}</a>
                    <img class="rounded-circle"
                         style="width: 40px; height: 40px; border: 2px Solid rgba(255, 255, 255, 0.1);"
                         src="{{ getImage('thumbnail', Auth::user()->profile->avatar) }}"
                         alt="{{ Auth::user()->profile->nickname }}">

                @endif
            </span>

            <button type="button" class="main-menu__button d-md-none">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

        </div>
    </nav>
    <div class="nav-scroller bg-white shadow">
        <div class="container">
            <div class="row">
                <nav class="nav nav-underline">
                    <a class="nav-link" href="#">#общество</a>
                    <a class="nav-link" href="#">#дети
                        <span class="badge badge-pill bg-light align-text-bottom">346</span>
                    </a>
                    <a class="nav-link" href="#">#семья
                        <span class="badge badge-pill bg-light align-text-bottom">247</span></a>
                    <a class="nav-link" href="#">#мода
                        <span class="badge badge-pill bg-light align-text-bottom">17</span></a>
                    <a class="nav-link" href="#">#покупки
                        <span class="badge badge-pill bg-light align-text-bottom">797</span></a>
                    <a class="nav-link" href="#">#здоровье
                        <span class="badge badge-pill bg-light align-text-bottom">67</span></a>
                    <a class="nav-link" href="#">#мужчины
                        <span class="badge badge-pill bg-light align-text-bottom">147</span></a>
                    <a class="nav-link" href="#">#отношения
                        <span class="badge badge-pill bg-light align-text-bottom">897</span></a>
                    <a class="nav-link" href="#">#психология
                        <span class="badge badge-pill bg-light align-text-bottom">337</span></a>
                    <a class="nav-link" href="#">#развлечения
                        <span class="badge badge-pill bg-light align-text-bottom">97</span></a>
                    <a class="nav-link" href="#">#спорт
                        <span class="badge badge-pill bg-light align-text-bottom">237</span></a>
                    <a class="nav-link" href="#">#диеты
                        <span class="badge badge-pill bg-light align-text-bottom">5437</span></a>
                    <a class="nav-link" href="#">#звезды
                        <span class="badge badge-pill bg-light align-text-bottom">637</span></a>
                    <a class="nav-link{{ is_active('home') }}" href="{{ route('home') }}">Главная</a>
                    <a class="nav-link{{ is_active('news.*') }}" href="{{ route('news.index') }}">Новости</a>
                    <a class="nav-link{{ is_active('stories.*') }}" href="{{ route('stories.index') }}">Истории</a>
                    <a class="nav-link{{ is_active('users.*') }}" href="{{ route('users.list') }}">Пользователи</a>
                </nav>
            </div>
        </div>
    </div>


    <script>

        jQuery(document).ready(function($) {
            var totalWidth = $(".nav").outerWidth();
            $('.nav a').css('width', totalWidth);
            var myScrollPos = $('.nav .active').offset().left + $('.nav .active').outerWidth(true) / 2 +
                $('.nav').scrollLeft() - $('.nav').width() / 2;
            $('.nav').scrollLeft(myScrollPos);


            $(window).on("orientationchange",function(){
                var totalWidth = $(".nav").outerWidth();

                $('.nav a').css('width', totalWidth);

                var myScrollPos = $('.nav .active').offset().left + $('.nav .active').outerWidth(true) / 2 +
                    $('.nav').scrollLeft() - $('.nav').width() / 2;

                $('.nav').scrollLeft(myScrollPos);

            });
        });


    </script>



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
