@extends('layouts.app')

@section('content')
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.dashboard') }}" class="text-info">
                Панель управления
            </a>
        </li>
        <li class="breadcrumb-item active">Новости</li>
    </ol>
    <!-- Breadcrumbs-->

    @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ Session::get('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="mb-3">
        <a class="btn btn-primary" href="{{route('admin.posts.create')}}">Добавить новость</a>
    </div>

    <table class="table table-hover">
        <tr class="bg-light">
            <th class="text-info">Заголовок</th>
            <th class="text-info">Категория</th>
            <th class="text-info">Добавил</th>
            <th class="text-info">Дата публикации</th>
            <th></th>
        </tr>

           @include('news.partials.item', ['posts' => $posts])

    </table>

    {!! $posts->links() !!}

@endsection