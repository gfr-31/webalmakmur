<?php

namespace App\Livewire\App;

use Livewire\Attributes\Title;
use Livewire\Component;

class Contact extends Component
{
    #[Title('MTS Al Makmur | Contact')]

    public function render()
    {
        return view('livewire.app.contact');
    }
}
