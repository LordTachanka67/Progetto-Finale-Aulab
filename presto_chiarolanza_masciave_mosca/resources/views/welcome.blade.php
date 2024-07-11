<x-layout>

    <x-masthead h1='HOME' />
    <div class="container">
        <div class="row gap-1  justify-content-center justify-content-around">
            @if ($articles->isEmpty())
                <p>Non ci sono articoli</p>
            @else
            @foreach ($articles as $article)
                <div class="col-12 col-md-3">
                    <x-card :article="$article" />
                </div>
            @endforeach
                
            @endif
        </div>
    </div>
</x-layout>
