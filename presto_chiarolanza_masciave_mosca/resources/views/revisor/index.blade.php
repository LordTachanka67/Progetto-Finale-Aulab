<x-layout>
    {{-- <x-masthead h1='Tutti gli articoli da revisionare' /> --}}
    <div class="container custom-margin-top">
        <div class="row gap-1 justify-content-center justify-content-evenly">
            <div class="col-12 p-5">
                <h1 class="text-center mb-3 ">{{ __('ui.articoliDaRevisionare') }}</h1>
                <p class="text-center mt-5">{{ __('ui.ciSono') }} <span>{{ $revisor_pending_number }}</span>
                    {{ __('ui.articoliDaRevisionare') }}</p>
            </div>

            @if ($lastModified)
                <div class="col-10 text-center">
                    <x-cancel />
                </div>
            @endif
            {{-- @dd($articles_pending) --}}
            {{-- <livewire:select-option 
            :articles_pending="$articles_pending"
            /> --}}
            @livewire('select-option', ['articles_pending' => $articles_pending->getCollection()])
            {{-- <label class="form-check-label" for="flexSwitchCheckChecked">Opzione</label> --}}
        </div>
    </div>

    {{-- @if ($articles_pending->isEmpty())
                <p>{{__('ui.nessunArticoloDaRevisionare')}}</p>
            @else
          <div id="articlesPending">
            
          </div>
            @foreach ($articles_pending as $article)
                <div class="col-12 col-md-5 col-lg-3">
                    <x-card-pending :article="$article" />
                </div>                
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
