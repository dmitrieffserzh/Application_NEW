<header class="header">

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
            <button type="button" class="main-menu__button d-md-none ">
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
                    <a class="nav-link" href="#">Общество</a>
                    <a class="nav-link" href="#">Дети</a>
                    <a class="nav-link" href="#">Семья</a>
                    <a class="nav-link" href="#">Мода</a>
                    <a class="nav-link" href="#">Покупки</a>
                    <a class="nav-link" href="#">Здоровье</a>
                    <a class="nav-link" href="#">Мужчины</a>
                    <a class="nav-link" href="#">Отношения</a>
                    <a class="nav-link" href="#">Психология</a>
                    <a class="nav-link" href="#">Развлечения</a>
                    <a class="nav-link" href="#">Спорт</a>
                    <a class="nav-link" href="#">Диеты</a>
                    <a class="nav-link" href="#">Звезды</a>
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
        {{--<li class="main-menu__item">    <a href="{{ route('login') }}" class="ajax-modal main-menu__link" data-toggle="modal" data-url="{{ route('login') }}" data-name="Войти" data-modal-size="modal-sm">Войти</a>--}}
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
