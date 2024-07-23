<x-layout>

    <x-masthead h1='{{ $article->title }}' />

    {{-- PATH PER ARRIVARE AL PRODOTTO --}}
    <div class="container-fluid">
        <div class="show-path mb-3">
            <span><a href="{{ route('homepage') }}">{{__('ui.home')}}</a> /</span>
            <span><a
                    href="{{ route('categories.byCategory', ['category' => $article->category]) }}">{{ __('ui.' . $article->category->name) }}</a>
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
                    <h2 class="display-5 article-text">{{ $article->title }}</h2>  
                    {{-- PREFERITI --}}
                    <span class="text-center">
                        @auth
                        @if ($exist)    
                    <form action="{{ route('articles.unfavourites', ['article' => $article]) }}" method="POST">
                            @csrf
                            <input  type="text" name="favourites[]" value="{{ $article->id }}" hidden>
                            <div class="d-flex align-items-center text-center"><button id="favourites" class="border-0 bg-transparent"><i class="bi bi-heart-fill fs-1 text-quar" id="preferiti"></i></button><span class="ms-1 mb-1 text-quar">{{__('ui.rimuoviPreferiti')}}</span></div>
                        </form>
                        @else
                        <form action="{{ route('articles.favourites', ['article' => $article]) }}" method="POST">
                            @csrf
                            <input type="text" name="favourites[]" value="{{ $article->id }}" hidden>
                               <div class="d-flex align-items-center text-center"><button id="favourites" class="border-0 bg-transparent"><i class="bi bi-heart fs-1 text-quar" id="preferiti"></i></button><span class="ms-1 mb-1 text-quar">{{__('ui.aggiungiPreferiti')}}</span></div>
                           </form>
                        @endif
                        
                        @endauth
                    </span>
                    

                    {{-- CATEGORIA E NOME UTENTE VENDITORE --}}
                    <h6 class="mb-5"><span class="badge me-3"><a
                                href="{{ route('categories.byCategory', ['category' => $article->category]) }}">{{ __('ui.' . $article->category->name) }}</a></span> 
                                <span class="badge me-3" > <a href="{{route('show.user', ['user' => $article->user->id]) }}">{{__('ui.vendutoDa')}}: {{ $article->user->name }}</a></span>  </h6>

                    {{-- PREZZO E BOTTONE AGGIUNGI AL CARRELLO --}}
                    <div class="d-flex flex-column align-items-center">
                        <h3 class="text-center display-4 fw-semibold article-text">
                            €{{ number_format($article->price, 2, ',') }} </h3>
                        <button class="btn btn-quar px-5 py-2 fs-3">{{__('ui.aggiungiAl')}} <i class="bi bi-cart3"></i></button>
                    </div>
                </div>
                
                {{-- DESCRIZIONE --}}
                <div class="col-12 mt-3 bg-quar">
                    <h5 class="mt-4 ms-3">{{__('ui.descrizione')}}: </h5>
                    <p class="ms-5 mt-2 mb-5">{{ $article->description }}</p>
                </div>
            </div>

            {{-- SEZIONE ARTICOLI CORRELATI --}}
            <div class="row justify-content-center my-5 correlated">
                <div class="col-12">
                    <h4 class="ms-5 mb-3">{{__('ui.articoliCorrelati')}}</h4>
                </div>
                @foreach ($correlated as $correlatedArticle)
                    @if ($correlatedArticle->id != $article->id)
                        <div class="col-6 col-md-2">
                            <div class="card mb-5">
                                <a class="text-decoration-none"
                                    href="{{ route('articles.show',['article' => $correlatedArticle]) }}">

                                    <div class="card-body text-center">
                                        <img src="{{$correlatedArticle->images->isNotEmpty() ? $correlatedArticle->images->first()->getUrl(400, 400) : '/background/default.jpg'}}" class="card-img-top" alt="{{$correlatedArticle->title}}">
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
