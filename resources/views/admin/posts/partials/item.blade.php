@foreach ($posts as $post)
    <tr>
        <td>
            <a href="{{ route('admin.posts.show',$post->id) }}"
               class="text-dark font-weight-bold">{{$post->title or ""}}</a>
        </td>
        <td>
            {{ $post->category->title }}
        </td>
        <td>
            Administrator
        </td>
        <td>
            {{ $post->created_at }}
        </td>
        <td>
            <div class="btn-group float-right" role="group">
                <a class="btn btn-primary btn-sm" href="{{ route('admin.posts.edit',$post->id) }}">Изменить</a>
                <a href="{{route( 'admin.posts.destroy', $post->id)}}" data-method="delete"
                   data-token="{{csrf_token()}}" data-confirm="Вы уверены?" class="btn btn-danger btn-sm">Удалить</a>
            </div>
        </td>
    </tr>
@endforeach