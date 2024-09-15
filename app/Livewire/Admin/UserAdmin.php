<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class UserAdmin extends Component
{
    #[Layout('components.layouts.admin')]
    #[Title('Panel Admin | User Admin')]
    public function render()
    {
        return view('livewire.admin.user-admin');
    }
}
