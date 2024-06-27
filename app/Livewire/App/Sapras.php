<?php

namespace App\Livewire\App;

use Livewire\Attributes\Title;
use Livewire\Component;

class Sapras extends Component
{
    #[Title('MTS Al Makmur | Sarana Prasarana')]
    public function render()
    {
        return view('livewire.app.sapras');
    }
}
