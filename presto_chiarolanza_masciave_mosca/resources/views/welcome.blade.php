<x-layout>

    <x-masthead h1='Presto.it'/>
    <div class="container">
        <div class="row gap-1  justify-content-center justify-content-around">
            <div class="col-12 text-center mb-3">
                <h2 class="display-5">Articoli recenti</h2>
            </div>
            @if ($articles->isEmpty())
                <p>Non ci sono articoli</p>
            @else
            @foreach ($articles as $article)
                <div class="col-12 col-md-3">
                    <x-card-custom :article="$article" />
                </div>
            @endforeach
                
            @endif
        </div>
    </div>
</x-layout>
