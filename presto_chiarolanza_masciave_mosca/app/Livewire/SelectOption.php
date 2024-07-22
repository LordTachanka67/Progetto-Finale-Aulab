<?php

namespace App\Livewire;

use Livewire\Component;

class SelectOption extends Component
{
    public $selectedOption;

        public function increment()
        {
           $selectedOption = $this->selectedOption + 1;
        }
    
        public function render()
        {
            return view('livewire.select-option');
        }
}

