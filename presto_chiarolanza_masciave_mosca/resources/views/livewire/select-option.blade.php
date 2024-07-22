<div >
    <div class="row">
     <div class="col-12">
         <div class="form-check form-switch">
         <span class="form-check-label" id="griglia">Griglia</span>
         <input wire:click="increment" class="form-check-input" type="checkbox" role="switch" id="switch">
         <span class="form-check-label"  id="griglia">Elenco</span>

         {{-- <label class="form-check-label" for="flexSwitchCheckChecked">Opzione</label> --}}
         </div>
     </div>
     @dd($articles_pending)
        @switch($selectedOption %2 == 0)
            @case(true)
            @if ($articles_pending->isEmpty())
            <p>{{__('ui.nessunArticoloDaRevisionare')}}</p>
                 @else
                 @foreach ($articles_pending as $article)
             <div class="col-12 col-md-5 col-lg-3">
                <x-card-pending :article="$article" />
               {{--  <x-safeSearch :article="$article" /> --}}
            </div>                
             @endforeach                
             @endif




                <p>ciao</p>
                @break
            @case(false)
                <p>no</p>
                @break
            @default
                
        @endswitch
    
        
    </div>
</div>

