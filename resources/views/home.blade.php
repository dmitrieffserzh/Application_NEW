@extends('layouts.app')

@section('content')

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <section class="section">

            @php($count = 1)
            @foreach($posts as $post)
                <div class="@if( $count == 1) col-lg-6 p-0 m-0 float-left @else col-lg-3 p-0 m-0 float-left @endif">
                    @include('news.partials.tiles.big_tile', ['content' => $post])
                </div>
                @php( $count++ )
            @endforeach

    </section>
    <main id="content" class="col-md-9 pb-4 border-right border-gray">
<!--
        <section class="section mb-3">

            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                <ol class="carousel-indicators">
                    @php($count = 0)
                    @foreach($posts as $post)
                        <li data-target="#carouselExampleFade" data-slide-to="{{ $count }}"
                            class="@if( $count == 0) active @endif"></li>
                        @php( $count++ )
                    @endforeach
                </ol>
                <div class="carousel-inner">
                    @php($count = 0)
                    @foreach($posts as $post)
                        <div class="carousel-item @if( $count == 0) active @endif">
                            <img class="d-block w-100" src="{{ getImage('news', $post->image) }}" alt="First slide">

                            <div class="carousel-caption d-none d-md-block">
                                <h5>{{ $post->title }}</h5>
                                <p>...</p>
                            </div>

                        </div>
                        @php( $count++ )
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </section>
-->
        {{--<section class="section mb-3">--}}
            {{--<div class="row">--}}
                {{--@php($count = 1)--}}
                {{--@foreach($posts as $post)--}}
                    {{--<div class="@if( $count == 1 || $count == 2 || $count == 3 ) col-lg-4 p-0 m-0 float-left @else col-lg-6 p-0 m-0 float-left @endif">--}}
                        {{--@include('news.partials.tiles.big_tile', ['content' => $post])--}}
                    {{--</div>--}}
                    {{--@php( $count++ )--}}
                {{--@endforeach--}}
            {{--</div>--}}
        {{--</section>--}}



    <h5 class="pt-5 text-uppercase font-weight-bold">Популярное <span style="font-weight: 100" class="text-muted">за неделю</span></h5>


    <section class="section mb-3">
        <div class="row">
            @php($count = 1)
            @foreach($posts as $post)
                <div class="@if( $count == 1 ) col-lg-6  @else col-lg-3 @endif">
                    @include('news.partials.tiles.big_tile', ['content' => $post])
                </div>
                @php( $count++ )
            @endforeach
        </div>
    </section>



    </main>
    {{--@php($count = 1)--}}
    {{--@foreach ($posts as $post)--}}

    {{--<div class="@if( $count == 1 || $count == 7 || $count == 11 ) col-lg-6 @else col-lg-6 @endif">--}}
    {{--<div class="mb-4 bg-white shadow-sm item-test">--}}
    {{--<img src="{{ getImage('news', $post->image) }}" width="100%">--}}
    {{--<div class="p-3--}}
    {{--@if( $count == 1 || $count == 7 || $count == 11 )--}}
    {{--position-absolute abs-pos--}}
    {{--@endif--}}
    {{--">--}}
    {{--<a href="{{ route('news.view',$post->id) }}"--}}
    {{--class="text-dark font-weight-bold">{{$post->title or ""}}</a>--}}
    {{--<h6 class="d-inline-block small text-light p-1" style="background: {{ $post->category->color }}"><a--}}
    {{--href="{{ route('news.category', $post->category->slug ) }}"--}}
    {{--class="text-light p-1 font-weight-bold">{{ $post->category->title }}</a></h6>--}}

    {{--<div class="" style="color: #b0bbc5;">{{ $post->created_at->diffForHumans() }}</div>--}}

    {{--<div class="btn-group float-right d-none" role="group">--}}
    {{--<a class="btn btn-light btn-sm" href="{{ route('admin.posts.edit',$post->id) }}">Изм</a>--}}
    {{--<a href="{{route( 'admin.posts.destroy', $post->id)}}" data-method="delete"--}}
    {{--data-token="{{csrf_token()}}" data-confirm="Вы уверены?" class="btn btn-light btn-sm">Удал</a>--}}
    {{--</div>--}}

    {{--@include('components.comments.comments_count', ['content'=>$post])--}}
    {{--@include('components.views.view_count', ['content'=>$post])--}}
    {{--@include('components.likes.like', ['content'=>$post])--}}

    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--@php( $count++ )--}}
    {{--@endforeach--}}




@endsection

@section('aside')
    <aside class="col-md-3 py-4">

        <h6 class="text-uppercase border-bottom border-gray pb-2 text-primary">Боковая колонка</h6>
        <ul class="aside-menu mb-5">
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


        <h6 class="text-uppercase text-primary">Новости</h6>

        @foreach($hot_posts as $post)
            <div class="">
                @include('news.partials.list.list', ['content' => $post])
            </div>
        @endforeach


    </aside>
@endsection