
@php($count = 0)
@foreach ($posts as $post)
    @if( $count % 3)
        wide block
    @endif
    <div>
        <a href="{{ route('admin.posts.show',$post->id) }}"
           class="text-dark font-weight-bold">{{$post->title or ""}}</a>

        {{ $post->category->title }}

        {{ $post->created_at }}

        <div class="btn-group float-right" role="group">
            <a class="btn btn-primary btn-sm" href="{{ route('admin.posts.edit',$post->id) }}">Изменить</a>
            <a href="{{route( 'admin.posts.destroy', $post->id)}}" data-method="delete"
               data-token="{{csrf_token()}}" data-confirm="Вы уверены?" class="btn btn-danger btn-sm">Удалить</a>
        </div>

    </div>
    @php( $count++ )
@endforeach