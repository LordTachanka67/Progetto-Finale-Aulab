<x-layout>
    <x-masthead h1='{{ $article->title }}' />

    <div class="container-fluid">
        <a class="btn btn-quar mb-3" href="{{ route('dashboard.index') }}"><i class="bi bi-arrow-bar-left"></i>
            {{ __('ui.tornaDashboard') }}</a>
        {{-- VISTA SHOW PER IL PRODOTTO --}}
        <div class="row px-5 justify-content-center">
            <div class="border border-5 shadow p-3 row">
                {{-- CAROUSEL --}}
                <div class="col-12 col-md-7 mb-3">
                    <x-carousel :article="$article" />
                </div>
                <div class="col-12 col-md-4 p-3 text-center">
                    {{-- TITOLO --}}
                    <h2 class="display-5 article-text">{{ $article->title }}</h2>
                    {{-- CATEGORIA E NOME UTENTE VENDITORE --}}
                    <h6 class="mb-5">
                        <span class="badge me-3">
                            <a>
                                {{ $article->category->name }}
                            </a>
                        </span>
                        <span class="badge me-3">{{ __('ui.vendutoDa') }}: {{ $article->user->name }}</span>

                    </h6>



                    {{-- PREZZO E BOTTONE AGGIUNGI AL CARRELLO --}}
                    <div class="d-flex flex-column align-items-center">
                        <h3 class="text-center display-4 fw-semibold article-text">
                            €{{ number_format($article->price, 2, ',') }} </h3>
                    </div>

                    {{-- <div>
                        <h3 class="text-danger">MOTIVO DEL RIFIUTO</h3>
                        <p>{{ $article->reason }}</p>
                    </div> --}}
                </div>
                {{-- DESCRIZIONE --}}
                <div class="col-12 mt-3 bg-quar">
                    <h5 class="mt-4 ms-3">{{ __('ui.descrizione') }}: </h5>
                    <p class="ms-5 mt-2 mb-5">{{ $article->description }}</p>
                </div>

            </div>

        </div>


    </div>

    {{-- <a href="{{route('articles.show', compact('article'))}}" class="btn btn-quar">Vai all'articolo</a> --}}
</x-layout>
