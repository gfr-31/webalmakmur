<?php

namespace App\Livewire\App;

use Livewire\Attributes\Title;
use Livewire\Component;

class Prestasi extends Component
{
    #[Title('MTS Al Makmur | Prestasi')]
    public function render()
    {
        return view('livewire.app.prestasi');
    }
}
