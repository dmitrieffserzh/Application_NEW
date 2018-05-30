@extends('layouts.administrator')

@push('custom-styles')
    <link href="{{ asset('css/admin/components/jq_minicolors.css') }}" rel="stylesheet">
@endpush
@push('custom-scripts')
    <script src="{{ asset('js/admin/components/jq_minicolors.js') }}"></script>
@endpush

@section('content')
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.dashboard') }}" class="text-info">
                Панель управления
            </a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('admin.categories.index') }}" class="text-info">
                Категории
            </a>
        </li>
        <li class="breadcrumb-item active">Добавить категорию</li>
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

    <div class="card-header">Добавить категорию</div>

    <div class="card-body">
        <div class="row">
            <form action="{{ route('admin.categories.store') }}" method="POST" class="col-lg-6">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="title">Название категории</label>
                    <input type="text" name="title" id="title" class="form-control" placeholder="">
                </div>

                <div class="form-group">
                    <label for="slug">URL категории</label>
                    <input type="text" name="slug" id="slug" class="form-control" placeholder="">
                    <p class="mt-1 p-2 bg-light small text-info rounded">Допускается ввод только латинских символов и
                        символов " _ " и " - " без пробелов!</p>
                </div>

                <div class="form-group">
                    <label for="parent_id">Родительская категория</label>
                    <select id="parent_id" class="form-control" name="parent_id">
                        <option value="0">-- без родительской --</option>
                        @include('admin.categories.partials.item_form', ['categories' => $categories])
                    </select>
                </div>

                <div class="form-group">
                    <label for="color">Цвет</label>
                    <input type="text" name="color" id="color" class="form-control color" value="#007bff">
                </div>

                <button type="submit" class="btn btn-primary">Добавить категорию</button>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('#color').minicolors();
        });
    </script>
@endsection