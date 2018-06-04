<article class="article mb-3 pt-3 pb-2 bg-white rounded shadow">
    <header class="article-header">
        <div class="media pb-3 px-3 border-bottom border-gray lh-100">
               <span class="d-inline-block position-relative mr-2">
                   <img class="rounded-circle" style="width: 30px; height: 30px;"
                        src="{{ getImage('thumbnail', $post->owner->profile->avatar) }}"
                        alt="{{ $post->owner->nickname }}">
                   @if($post->owner->isOnline())
                       <span class="component-status component-status--online"></span>
                   @else
                       <span class="component-status component-status--offline"></span>
                   @endif
               </span>
            <div class="media-body">
                <a class="text-dark small font-weight-bold li" href="{{ route('users.profile', $post->owner->id) }}"
                   title="{{ $post->owner->nickname }}">
                    {{ $post->owner->nickname }}
                </a>

                @if(Auth::user())
                <span class="float-right">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#b6bcc7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>

                </span>
                @endif
                <span class="d-block text-muted small font-weight-light font-monospace">
                        {{ $post->created_at->diffForHumans() }}
                    </span>
            </div>
        </div>
        <h5 class="pt-3 px-3">
            <a href="{{ route('stories.view', $post->id) }}">
                {{ $post->title }}
            </a>
        </h5>
    </header>
    <div class="article-content">
        {!! $post->content !!}
    </div>
    <footer class="article-footer pt-2 px-3 border-top border-gray lh-100">

        @include('components.comments.comments_count', ['content'=>$post])
        @include('components.views.view_count', ['content'=>$post])
        @include('components.likes.like', ['content'=>$post])

    </footer>
</article>