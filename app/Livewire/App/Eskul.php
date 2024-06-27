<?php

namespace App\Livewire\App;

use Livewire\Attributes\Title;
use Livewire\Component;

class Eskul extends Component
{
    #[Title('MTS Al Makmur | Ekstrakulikuler')]
    public function render()
    {
        return view('livewire.app.eskul');
    }
}
