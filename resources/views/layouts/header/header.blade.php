<header class="header">
    <div class="container">
        <div class="brand">LOGO</div>
        <nav class="nav">
            <ul class="nav-menu">
                <li class="nav-menu__item{{ is_active('news.*') }}">
                    <a href="{{ route('news.index') }}" class="nav-menu__item-link">Новости</a>
                    <ul class="nav-submenu">
                        <li class="nav-submenu__item"><a href="" class="nav-submenu__item-link">Submenu_item</a></li>
                        <li class="nav-submenu__item"><a href="" class="nav-submenu__item-link">Submenu_item</a></li>
                        <li class="nav-submenu__item"><a href="" class="nav-submenu__item-link">Submenu_item</a></li>
                        <li class="nav-submenu__item"><a href="" class="nav-submenu__item-link">Submenu_item</a></li>
                        <li class="nav-submenu__item"><a href="" class="nav-submenu__item-link">Submenu_item</a></li>
                    </ul>
                </li>
                <li class="nav-menu__item{{ is_active('stories.*') }}">
                    <a href="{{ route('stories.index') }}" class="nav-menu__item-link">Истории</a>
                    <ul class="nav-submenu">
                        <li class="nav-submenu__item"><a href="" class="nav-submenu__item-link">Submenu_item</a></li>
                        <li class="nav-submenu__item"><a href="" class="nav-submenu__item-link">Submenu_item</a></li>
                        <li class="nav-submenu__item"><a href="" class="nav-submenu__item-link">Submenu_item</a></li>
                        <li class="nav-submenu__item"><a href="" class="nav-submenu__item-link">Submenu_item</a></li>
                        <li class="nav-submenu__item"><a href="" class="nav-submenu__item-link">Submenu_item</a></li>
                    </ul>
                </li>
                <li class="nav-menu__item{{ is_active('users.*') }}">
                    <a href="{{ route('users.list') }}" class="nav-menu__item-link">Пользователи</a>
                    <ul class="nav-submenu">
                        <li class="nav-submenu__item"><a href="" class="nav-submenu__item-link">Submenu_item</a></li>
                        <li class="nav-submenu__item"><a href="" class="nav-submenu__item-link">Submenu_item</a></li>
                        <li class="nav-submenu__item"><a href="" class="nav-submenu__item-link">Submenu_item</a></li>
                        <li class="nav-submenu__item"><a href="" class="nav-submenu__item-link">Submenu_item</a></li>
                        <li class="nav-submenu__item"><a href="" class="nav-submenu__item-link">Submenu_item</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        @include('components.users.user_menu_top')
    </div>
</header>