<article class="news news-tile news-tile__wide">
    <span class="news-tile__bg"></span>
    <header class="news-tile__wide-header">

        @include('components.comments.comments_count', ['content'=>$content])
        @include('components.views.view_count', ['content'=>$content])
        @include('components.likes.like', ['content'=>$content])


        <span class="news-tile__wide-category d-block mt-5 text-light small text-lowercase">
            {{ $post->created_at->diffForHumans() }}
        </span>

        <span class="news-tile__wide-category mt-4 py-1 px-2 text-light small text-uppercase" style="background: {{ $content->category->color }}">
            {{ $content->category->title }}
        </span>
        <h4 class="mt-3">{{ $content->title }}</h4>
    </header>

    <img src="{{ getImage('news', $content->image) }}" width="100%">
    <footer class="news-tile__wide-footer">
        <!--<span class="d-inline-block position-relative mr-2">

            <img class="rounded-circle" style="width: 40px; height: 40px;"
                        src="{{ getImage('thumbnail', $content->owner->profile->avatar) }}"
                        alt="{{ $content->owner->nickname }}">
               </span>
        <a class="text-light font-weight-bold li" href="{{ route('users.profile', $content->owner->id) }}"
           title="{{ $content->owner->nickname }}">
            {{ $content->owner->nickname }}
        </a>
-->
    </footer>
</article>