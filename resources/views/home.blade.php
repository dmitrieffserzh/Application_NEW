@extends('layouts.app')

@section('content')

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div class="col-md-9">



        @foreach($posts as $post)

            @include('news.partials.tiles.big_tile', ['content' => $post])

        @endforeach
    
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









    </div>

@endsection

@section('aside')
    <aside class="col-md-3">
        <ul>
            <li><a href="{{ route('users.list') }}">Пользователи</a></li>
            <li><a href="{{ route('news.index') }}">Новости</a></li>
            <li><a href="{{ route('stories.index') }}">Истории</a></li>

            <!-- Authentication Links -->
            @if (Auth::guest())
                <li><a href="{{ route('login') }}" class="ajax-modal main-menu__link" data-toggle="modal" data-url="{{ route('login') }}" data-name="Войти" data-modal-size="modal-sm">Войти</a></li>
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