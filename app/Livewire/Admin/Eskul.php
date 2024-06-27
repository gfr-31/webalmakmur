<?php

namespace App\Livewire\Admin;

use App\Models\Eskul as ModelsEskul;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Eskul extends Component
{
    #[Layout('components.layouts.admin')]
    #[Title('Panel Admin | Ekstrakulikuler')]
    public function render()
    {
        return view('livewire.admin.eskul', [
            'eskul' => ModelsEskul::all()
        ]);
    }
}
