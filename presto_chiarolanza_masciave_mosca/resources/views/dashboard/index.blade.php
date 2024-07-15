<x-layout>
    <x-masthead h1='Dashboard' />
    <div class="container">
        {{-- ARTICOLI ACCETTATI --}}
        <div class="row gap-1  justify-content-center justify-content-evenly">
            @if ($acceptedArticles->isNotEmpty())
                <h2>Articoli accettati</h2>
                @foreach ($acceptedArticles as $article)
                    <div class="col-12 col-md-5 col-lg-3 ">
                        <x-dashboard-card :article="$article" />

                    </div>
                @endforeach
            @else
                Nessun articolo accetatto
            @endif
        </div>

        {{-- ARTICOLI RIFIUTATI --}}
        <div class="row gap-1  justify-content-center justify-content-evenly">

            @if ($rejectedArticles->isNotEmpty())
                <h2>Articoli rifiutati</h2>
                @foreach ($rejectedArticles as $article)
                    <div class="col-12 col-md-5 col-lg-3 ">
                        <x-dashboard-card :article="$article" />

                    </div>
                @endforeach
            @else
                Nessun articolo rifiutato
            @endif
        </div>

         {{-- ARTICOLI IN FASE DI ELABORAZIONE --}}
         <div class="row gap-1  justify-content-center justify-content-evenly">

            @if ($pendingArticles->isNotEmpty())
                <h2>Articoli in fase di elaborazione</h2>
                @foreach ($pendingArticles as $article)
                    <div class="col-12 col-md-5 col-lg-3 ">
                        <x-dashboard-card :article="$article" />

                    </div>
                @endforeach
            @else
                Nessun articolo in fase di elaborazione
            @endif
        </div>
    </div>


    </div>

</x-layout>
