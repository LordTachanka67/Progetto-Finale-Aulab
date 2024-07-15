<x-layout>
    <x-masthead h1='Tutti gli articoli da revisionare' />
    <div class="container">
        <div class="row gap-1  justify-content-center justify-content-evenly">
            @if ($articles_pending->isEmpty())
                <p>Non ci sono articoli da revisionare</p>
            @else
            @foreach ($articles_pending as $article)
                <div class="col-12 col-md-3">
                    <x-card-custom :article="$article" />
                </div>
            @endforeach
                
            @endif
        </div>
        <div class="d-flex justify-content-center">
            <div class="col-12">
                {{ $articles->links() }}
            </div>
        </div>
    </div>
</x-layout>