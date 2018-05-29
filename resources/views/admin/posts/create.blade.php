@extends('admin.layouts.administrator')

@section('content')
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.dashboard') }}" class="text-info">
                Панель управления
            </a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('admin.posts.index') }}" class="text-info">
                Новости
            </a>
        </li>
        <li class="breadcrumb-item active">Добавить новость</li>
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
    @if(Session::has('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            {{ Session::get('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card-header">Добавить новость</div>

    <div class="card-body">
        <div class="row">
            <form action="{{ route('admin.posts.store') }}" method="POST" class="col-lg-6">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="title">Заголовок</label>
                    <input type="text" name="title" id="title" class="form-control" id="formGroupExampleInput"
                           placeholder="">
                </div>

                <div class="form-group">
                    <label for="category_id">Категория</label>
                    <select id="category_id" class="form-control" name="category_id">
                        <option value="0">-- без родительской --</option>
                        @include('admin.categories.partials.item_form', ['categories' => $categories])
                    </select>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="published" id="published-1" value="1" checked>
                    <label class="form-check-label" for="published-1">
                        Опубликовать
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="published" id="published-0" value="0">
                    <label class="form-check-label" for="published-0">
                        Скрыть
                    </label>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Текст новости</label>
                    <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Опубликовать</button>
            </form>
        </div>
    </div>
@endsection