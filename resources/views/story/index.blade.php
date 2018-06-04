@push('custom-scripts')
    <!--<script src="{{ asset('js/components/jq_scroll.js') }}"></script>
    <script src="{{ asset('js/components/paginate.js') }}"></script>-->
@endpush

@extends('layouts.app')

@section('content')

    {{--@include('posts.partials.form_list')--}}
    <main id="content" class="col-md-7 ">
        <div class="row">
            <section class="section col p-0">
                @forelse ($posts as $post)

                    @include('story.partials.item', ['post' => $post])

                @empty

                    <div class="alert">
                        <p>Нет записей!</p>
                    </div>

                @endforelse

                    {!! $posts->links() !!}
            </section>
        </div>
    </main>

@endsection


@section('aside')
    <aside class="col-md-3 py-4">

        <h6 class="text-uppercase border-bottom border-gray pb-2 text-primary">Боковая колонка</h6>
        <ul class="aside-menu">
            <li><a href="{{ route('users.list') }}">Пользователи</a></li>
            <li><a href="{{ route('news.index') }}">Новости</a></li>
            <li><a href="{{ route('stories.index') }}">Истории</a></li>

            <!-- Authentication Links -->
            @if (Auth::guest())
                <li><a href="{{ route('login') }}" class="ajax-modal main-menu__link" data-toggle="modal"
                       data-url="{{ route('login') }}" data-name="Войти" data-modal-size="modal-sm">Войти</a></li>
                <li><a href="{{ route('register') }}">Регистрация</a></li>
            @else
                <li>
                    <a href="{{ route('users.profile', Auth::id()) }}">
                        {{ Auth::user()->nickname }}
                    </a>

                </li>

                <li>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                        Выйти
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>

            @endif
        </ul>
    </aside>
@endsection