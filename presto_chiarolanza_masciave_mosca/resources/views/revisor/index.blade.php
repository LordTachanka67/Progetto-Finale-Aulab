<x-layout>
    {{-- <x-masthead h1='Tutti gli articoli da revisionare' /> --}}
    <div class="container custom-margin-top">
        <div class="row gap-1 justify-content-center justify-content-evenly">
            <div class="col-12 p-5">
                <h1 class="text-center mb-3 ">{{__('ui.articoliDaRevisionare')}}</h1>
                <p class="text-center mt-5">{{__('ui.ciSono')}} <span>{{$revisor_pending_number}}</span> {{__('ui.articoliDaRevisionare')}}</p>
            </div>

            @if($lastModified) 
            <div class="col-10">
                <x-cancel />
            </div>
            @endif
            <livewire:select-option 
            :articles_pending="$articles_pending"
            />

            {{-- @if ($articles_pending->isEmpty())
                <p>{{__('ui.nessunArticoloDaRevisionare')}}</p>
            @else
            @foreach ($articles_pending as $article)
                <div class="col-12 col-md-5 col-lg-3">
                    <x-card-pending :article="$article" /> --}}
                   {{--  <x-safeSearch :article="$article" /> --}}
                {{-- </div>                
            @endforeach                
            @endif --}}
        </div>
        <div class="d-flex justify-content-center">
            <div class="col-12">
                {{ $articles_pending->links() }}
            </div>
        </div>
    </div>
</x-layout>