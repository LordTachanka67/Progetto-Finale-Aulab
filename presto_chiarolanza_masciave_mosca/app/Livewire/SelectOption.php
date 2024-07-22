<?php

namespace App\Livewire;

use Livewire\Component;

class SelectOption extends Component
{
    public $selectedOption=0;
    

        public function increment()
        {
           $selectedOption = $this->selectedOption++;
           return $selectedOption;
           dd($selectedOption);
        }
    
        public function render()
        {
            return view('livewire.select-option');
        }
}

