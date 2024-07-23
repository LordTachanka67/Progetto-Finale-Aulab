<x-layout>

    <x-masthead h1='{{ $article->title }}' />

    <div class="container ">
        <a class="btn btn-quar mb-3" href="{{ route('revisor.index') }}"><i class="bi bi-arrow-bar-left"></i>
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
                    <h6 class="mb-5"><span class="badge me-3"><a>{{ $article->category->name }}</a></span>
                        <span class="badge me-3">{{ __('ui.vendutoDa') }}: {{ $article->user->name }}</span>
                    </h6>

                    {{-- PREZZO E BOTTONE AGGIUNGI AL CARRELLO --}}
                    <div class="d-flex flex-column align-items-center">
                        <h3 class="text-center display-4 fw-semibold article-text">
                            €{{ number_format($article->price, 2, ',') }} </h3>
                    </div>

                    <div class="row my-5 justify-content-center">
                        <div class="col-6 col-md-4 text-center">

                            <form action="{{ route('article.reject', ['article' => $article]) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="" class="btn btn-danger py-2 px-3 fs-3">
                                    <i class="bi bi-x-lg"></i>
                                </button>
                                {{-- <div class="my-3" >
                                    <label for="reasonTextArea">Commento</label>
                                    <textarea id="reasonTextArea" class="form-control" name="reason" cols="30" rows="2"></textarea>
                                </div> --}}


                            </form>
                        </div>
                        <div class="col-6 col-md-4 text-center">
                            <form action="{{ route('article.accept', ['article' => $article]) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-success py-2 px-3 fs-3">{{-- {{ __('ui.accetta') }} --}} <i
                                        class="bi bi-check2"></i> </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <x-safeSearch :article="$article" />
                </div>
                {{-- DESCRIZIONE --}}
                <div class="col-12 mt-3 bg-quar">
                    <h5 class="mt-4 ms-3">{{ __('ui.descrizione') }}: </h5>
                    <p class="ms-5 mt-2 mb-5">{{ $article->description }}</p>
                </div>

            </div>
        </div>
    </div>
</x-layout>
