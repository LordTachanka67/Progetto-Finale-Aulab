<x-layout>

    <x-masthead h1='{{ $article->title }}' />

    {{-- PATH PER ARRIVARE AL PRODOTTO --}}
    <div class="container-fluid">
        <div class="show-path mb-3">
            <span><a href="{{ route('homepage') }}">home</a> /</span>
            <span><a
                    href="{{ route('categories.byCategory', ['category' => $article->category]) }}">{{ $article->category->name }}</a>
                /</span>
            <span>{{ $article->title }}</span>
        </div>
        {{--
            <p>
                /<a href="{{route('homepage')}}">home</a>/
                <a href="{{route('categories.byCategory',compact('category'))}}">{{$article->category->name}}</a>
                /
            </p> --}}

        {{-- VISTA SHOW PER IL PRODOTTO --}}
        <div class="row px-5 justify-content-center">

            {{-- CAROUSEL --}}
            <div class="col-12 col-md-7 mb-3">
                <x-carousel :article="$article" />
            </div>


                <div class="col-12 col-md-4 p-3 text-center">
                    {{-- TITOLO --}}
                    <h2 class="display-3 article-text">{{ $article->title }}</h2>
                    {{-- CATEGORIA E NOME UTENTE VENDITORE --}}
                    <h6 class="mb-5"><span class="badge me-3"><a
                                href="{{ route('categories.byCategory', ['category' => $article->category]) }}">{{ $article->category->name }}</a></span>Venduto
                        da: {{ $article->user->name }}</h6>

                    {{-- PREZZO E BOTTONE AGGIUNGI AL CARRELLO --}}
                    <div class="d-flex flex-column align-items-center">
                        <h3 class="text-center display-4 fw-semibold article-text">
                            €{{ number_format($article->price, 2, ',') }} </h3>
                        <button class="btn btn-quar px-5 py-2 fs-3">Aggiungi al <i class="bi bi-cart3"></i></button>
                    </div>
                </div>
                {{-- DESCRIZIONE --}}
                <div class="col-12 mt-3 bg-quar">
                    <h5 class="mt-4 ms-3">Descrizione: </h5>
                    <p class="ms-5 mt-2 mb-5">{{ $article->description }}</p>
                </div>
            </div>

            {{-- SEZIONE ARTICOLI CORRELATI --}}
            <div class="row justify-content-center my-5 correlated">
                <div class="col-12">
                    <h4 class="ms-5 mb-3">Articoli correlati</h4>
                </div>
                @foreach ($correlated as $correlatedArticle)
                    @if ($correlatedArticle->id != $article->id)
                        <div class="col-6 col-md-2">
                            <div class="card mb-5">
                                <a class="text-decoration-none"
                                    href="{{ route('articles.show',['article' => $correlatedArticle]) }}">

                                    <div class="card-body text-center">
                                        <img src="{{ $correlatedArticle->images->isNotEmpty() ? Storage::url($correlatedArticle->images->first()->path) : '/background/default.jpg' }}"
                                            class=" card-img-top" alt="{{ $correlatedArticle->title }}">
                                        <h5 class="card-title text-truncate text-dark ">{{ $correlatedArticle->title }}</h5>
                                        <p class="card-title text-dark lead">
                                            €{{ number_format($correlatedArticle->price, 2, ',') }} </p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

        {{-- <a href="{{route('articles.show', compact('article'))}}" class="btn btn-quar">Vai all'articolo</a> --}}
</x-layout>
