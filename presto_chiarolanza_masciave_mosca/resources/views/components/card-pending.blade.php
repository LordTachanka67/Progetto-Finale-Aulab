
<div class="card mb-5">
    @if (request()->is('categories/' . $article->category_id))
    @else
        <div>
            <span class="badge position-absolute">{{ $article->category->name }}</span>
        </div>
    @endif
    {{-- @dd($article->images); --}}
    <img src="{{ $article->images->isNotEmpty() ? $article->images->first()->getUrl(400, 400) : '/background/default.jpg' }}"
        class=" card-img-top" alt="{{ $article->title }}">
    <div class="card-details text-center">
        <p class="text-title text-truncate text-quar text-truncate">{{ $article->title }}</p>
        <p class="text-body text-truncate">{{ $article->description }}</p>
        <p class="text-title text-quar">{{ __('ui.prezzo') }}:<br> €{{ number_format($article->price, 2, ',') }}</p>

    </div>
    <a href="{{ route('revisor.show', compact('article')) }}"
        class="card-button btn-quar text-decoration-none text-center">{{ __('ui.vaiArticolo') }}</a>
</div>
