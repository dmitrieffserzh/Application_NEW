<article class="news news-tile border-top border-gray py-2">
        <p class=" m-0"  style="font-size: 14px; font-weight: bold;">{{ $content->title }}
    <span class="d-block small text-muted text-lowercase" style="font-size: 12px;">
            {{ $post->created_at->diffForHumans() }}
        </span></p>
</article>