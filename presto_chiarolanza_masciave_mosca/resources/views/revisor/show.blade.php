<x-layout>

    <x-masthead h1='{{ $article->title }}' />

    {{-- PATH PER ARRIVARE AL PRODOTTO --}}
    <div class="container-fluid">
        

        {{-- VISTA SHOW PER IL PRODOTTO --}}
        <div class="row px-5 justify-content-center">

            {{-- CAROUSEL --}}
            <div class="col-12 col-md-7 mb-3">
                <x-carousel />
            </div>


            <div class="col-12 col-md-4 p-3 text-center">
                {{-- TITOLO --}}
                <h2 class="display-3 article-text">{{ $article->title }}</h2>
                {{-- CATEGORIA E NOME UTENTE VENDITORE --}}
                <h6 class="mb-5"><span class="badge me-3"><a
                            >{{ $article->category->name }}</a></span>Venduto
                    da: {{ $article->user->name }}</h6>

                {{-- PREZZO E BOTTONE AGGIUNGI AL CARRELLO --}}
                <div class="d-flex flex-column align-items-center">
                    <h3 class="text-center display-4 fw-semibold article-text">
                        €{{ number_format($article->price, 2, ',') }} </h3>
                </div>
            </div>
            {{-- DESCRIZIONE --}}
            <div class="col-12 mt-3 bg-quar">
                <h5 class="mt-4 ms-3">Descrizione: </h5>
                <p class="ms-5 mt-2 mb-5">{{ $article->description }}</p>
            </div>
            <div>
            <form action="{{route('article.reject', ['article' => $article])}}" method="POST">
                @csrf
                @method('PATCH')
                <button type="submit" class="btn btn-danger">Rifiuta</button>
            </form> 
            <form action="{{route('article.accept', ['article' => $article])}}" method="POST">
                @csrf
                @method('PATCH')
                <button type="submit" class="btn btn-success">Accetta</button>
            </form>
            </div>
        </div>

      
    </div>

    {{-- <a href="{{route('articles.show', compact('article'))}}" class="btn btn-quar">Vai all'articolo</a> --}}
</x-layout>
