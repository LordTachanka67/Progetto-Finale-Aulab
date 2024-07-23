<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Session;

class SelectOption extends Component
{
    #[Session]
    public $selectedOption;
    public $articles_pending = [];


    public function mount($articles_pending)
    {
        $this->articles_pending = $articles_pending;
    }

    public function increment()
    {
        $this->selectedOption++;
        return $this->selectedOption;
    }


    public function render()
    {
        return view('livewire.select-option');
    }
}
