<?php

namespace App\Livewire\App;

use Livewire\Attributes\Title;
use Livewire\Component;

class DataGuru extends Component
{
    #[Title('MTS Al Makmur | Data Guru')]
    public function render()
    {
        return view('livewire.app.data-guru');
    }
}
