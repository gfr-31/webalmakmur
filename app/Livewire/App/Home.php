<?php

namespace App\Livewire\App;

use Livewire\Attributes\Title;
use Livewire\Component;

class Home extends Component
{
    #[Title('MTS Al Makmur | Home')]
    public function render()
    {
        return view('livewire.app.home');
    }
}
