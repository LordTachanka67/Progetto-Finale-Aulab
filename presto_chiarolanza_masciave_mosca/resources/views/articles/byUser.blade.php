<x-layout>



    <x-masthead h1="{{$userName}}" />


    <div class="container custom">
        <div class="row gap-1  justify-content-center justify-content-evenly">
            @if ($articles->isEmpty())
                <p>{{__('ui.nonCiSonoArticoli')}}</p>
            @else
            @foreach ($articles as $article)
                <div class="col-12 col-md-5 col-lg-3">
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