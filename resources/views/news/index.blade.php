@extends('layouts.app')

@section('content')

    @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ Session::get('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="row">
        @include('news.partials.item', ['posts' => $posts])
    </div>

    {!! $posts->links() !!}

@endsection