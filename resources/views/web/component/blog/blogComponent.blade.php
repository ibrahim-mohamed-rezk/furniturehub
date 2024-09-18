<div class="card-grid-style-1">
    <div class="image-box"><a href="{{ $article->url }}"><img
        src="{{ asset($article->image_logo) }}" alt="{{ $article->title }}" loading="lazy"></a>
    </div><div class="tag-dot font-xs">{{ $article->type->name }}</div><a
            class="color-gray-1100" href="{{ $article->url }}">
        <h4>{{ $article->title }}</h4>
    </a>
    <div class="mt-20"><span
                class="color-gray-500 font-xs mr-30">{{ $article->created_at->format('F d, Y') }}</span>
    </div>
</div>