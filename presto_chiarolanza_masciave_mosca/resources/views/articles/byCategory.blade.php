<x-layout>

    <x-masthead h1="{{__('ui.' . $category->name)}}" />
    <div class="container">
        <div class="row gap-1  justify-content-center justify-content-around">
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
                {{$articles->links() }}
            </div>
        </div>
    </div>
</x-layout>
