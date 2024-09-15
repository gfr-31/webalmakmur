<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Sapras extends Component
{
    #[Layout('components.layouts.admin')]
    #[Title('Panel Admin | Sarana-Prasarana')]
    public function render()
    {
        return view('livewire.admin.sapras');
    }
}
