<article class="news news-tile border-top border-gray py-2">
    <span class="news-tile__wide-category d-inline-block font-weight-bold text-white small text-uppercase px-1"
          style="background: {{ $content->category->color }}">
        {{ $content->category->title }}
    </span>
    <p class=" m-0" style="font-size: 14px; font-weight: bold;">
        {{ $content->title }}
    </p>

    <div class="small" style="font-size: 12px !important;">
        {!! mb_strimwidth($content->content, 0, 60, '...') !!}
    </div>

    <span class="d-block small text-muted text-lowercase" style="font-size: 12px;">
        {{ $post->created_at->diffForHumans() }}
    </span>
</article>