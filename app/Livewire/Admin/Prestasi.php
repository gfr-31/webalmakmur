<?php

namespace App\Livewire\Admin;

use App\Models\Prestasi as ModelsPrestasi;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Prestasi extends Component
{
    #[Layout('components.layouts.admin')]
    #[Title('Panel Admin | Prestasi')]

    public function delete($id){
        $prestasi = ModelsPrestasi::find($id);
        $prestasi->delete();
    }
    public function render()
    {
        return view('livewire.admin.prestasi', [
            'prestasi' => ModelsPrestasi::all(),
        ]);
    }
}
