@if ($article->images->count())
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">

            @foreach ($article->images as $key => $image)
                <div class="carousel-item @if ($loop->first) active @endif">

                    <img class="img-fluid" src="{{ $image->getUrl(800, 600) }}" alt="{{ $article->title }}">

                </div>
            @endforeach
        </div>
        @if ($article->images->count() > 1)
            <button class="carousel-control-prev " type="button" data-bs-target="#carouselExampleAutoplaying"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon text-quar" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        @endif
    </div>
@else
    <img src="/background/default.jpg" class="card-img-top " alt="Nessuna immagine inserita">

@endif

{{-- {{Storage::url($image->path)}} --}}
