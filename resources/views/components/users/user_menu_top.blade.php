
    {{--@if(Auth::guest())--}}
        {{--<a href="{{ route('login') }}" class="ajax-modal component-user-top__link" data-toggle="modal"--}}
           {{--data-url="{{ route('login') }}" data-name="Войти" data-modal-size="modal-sm">Войти</a>--}}
    {{--@else--}}
        {{--<ul class="user-menu">--}}
            {{--<li class="user-menu__item">--}}

                {{--<a class="text-white" href="{{ route('users.profile', Auth::user()->id) }}"--}}
                   {{--title="{{ Auth::user()->nickname }}">{{ Auth::user()->nickname }}</a>--}}
                {{--<img class="rounded-circle"--}}
                     {{--style="width: 40px; height: 40px; border: 2px Solid rgba(255, 255, 255, 0.1);"--}}
                     {{--src="{{ getImage('thumbnail', Auth::user()->profile->avatar) }}"--}}
                     {{--alt="{{ Auth::user()->profile->nickname }}">--}}


                {{--<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">--}}
                    {{--<a class="dropdown-item" href="#">Action</a>--}}
                    {{--<a class="dropdown-item" href="#">Another action</a>--}}
                    {{--<a class="dropdown-item" href="#">Something else here</a>--}}
                {{--</div>--}}
            {{--</li>--}}
        {{--</ul>--}}
    {{--@endif--}}


<div class="dropdown d-inline-block float-right">
    @if(Auth::guest())
        <a href="{{ route('login') }}" class="ajax-modal nav-menu__item-link" data-toggle="modal"
        data-url="{{ route('login') }}" data-name="Войти" data-modal-size="modal-sm">Войти</a>
    @else
    <a class="" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <img class="rounded-circle"
             style="width: 40px; height: 40px; border: 2px Solid rgba(255, 255, 255, 0.1);"
             src="{{ getImage('thumbnail', Auth::user()->profile->avatar) }}"
             alt="{{ Auth::user()->profile->nickname }}">
    </a>

    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
        <a class="k__link" href="#">Action</a>
        <a class="k__link" href="#">Another action</a>
        <a class="k__link" href="#">Something else here</a>
    </div>
    @endif
</div>