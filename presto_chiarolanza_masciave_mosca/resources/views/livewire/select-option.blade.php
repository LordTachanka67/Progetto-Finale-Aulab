<div>
    <div>
     
                <div class="form-check form-switch">
                <input wire:click="increment" class="form-check-input" type="checkbox" role="switch" id="switch">
                <label class="form-check-label" for="flexSwitchCheckChecked">Opzione</label>
                </div>
        
                @dd($selectedOption)
    
        @if ($selectedOption %2 == 0)
            <p>Hai selezionato: {{ $selectedOption ? 'Sì' : 'No' }}</p>
        @else
            <p>Nessuna opzione selezionata</p>
        @endif
    </div>
</div>

