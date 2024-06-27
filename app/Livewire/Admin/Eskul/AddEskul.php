<?php

namespace App\Livewire\Admin\Eskul;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class AddEskul extends Component
{
    #[Layout('components.layouts.admin')]
    #[Title('Panel Admin | Add-Ekstrakulikuler')]
    public function render()
    {
        return view('livewire.admin.eskul.add-eskul');
    }
}
