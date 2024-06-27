<?php

namespace App\Livewire\App;

use Livewire\Attributes\Title;
use Livewire\Component;

class Gallery extends Component
{
    #[Title('MTS Al Makmur | Gallery')]
    public function render()
    {
        return view('livewire.app.gallery');
    }
}
