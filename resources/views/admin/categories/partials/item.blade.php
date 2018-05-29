@foreach ($categories as $category)
    <tr>
        <td>
            {!! $delimiter or "" !!}<a href="{{ route('admin.categories.show',$category->id) }}" class="text-dark font-weight-bold">{{$category->title or ""}}</a>
        </td>
        <td>
            {{ $category->slug }}
        </td>
        <td>
            <div class="btn-group float-right" role="group">
                <a class="btn btn-primary btn-sm" href="{{ route('admin.categories.edit',$category->id) }}">Изменить</a>
                <a href="{{route( 'admin.categories.destroy', $category->id)}}" data-method="delete"
                   data-token="{{csrf_token()}}" data-confirm="Вы уверены?" class="btn btn-danger btn-sm">Удалить</a>
            </div>
        </td>
    </tr>
    @if(count($category->children) > 0)

        @include('admin.categories.partials.item', [
          'categories' => $category->children,
          'delimiter'  => '—' . $delimiter . ' '
        ])

    @endif
@endforeach