@extends('administrator')

@section('content')
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.dashboard') }}" class="text-info">
                Панель управления
            </a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('admin.posts.categories.index') }}" class="text-info">
                Категории
            </a>
        </li>
        <li class="breadcrumb-item active">{{ $category->title }}</li>
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

    <div>
        {{ $category->title }}
    </div>
    <div>
        {{ $category->slug }}
    </div>

    <div class="mt-4 pt-3 border-top border-gray">
        <a class="btn btn-primary btn-sm" href="{{ route('admin.posts.categories.edit',$category->id) }}">Изменить</a>
        <a href="{{route( 'admin.posts.categories.destroy', $category->id)}}" data-method="delete"
           data-token="{{csrf_token()}}" data-confirm="Вы уверены?" class="btn btn-danger btn-sm">Удалить</a>
    </div>

@endsection