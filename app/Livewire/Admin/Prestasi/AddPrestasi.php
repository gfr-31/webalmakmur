<?php

namespace App\Livewire\Admin\Prestasi;

use App\Models\Prestasi;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddPrestasi extends Component
{

    use WithFileUploads;

    #[Layout('components.layouts.admin')]
    #[Title('Panel Admin | Add-Prestasi')]

    #[Rule('required|min:3|max:50')]
    public $title;
    #[Rule('required|min:15|max:255')]
    public $description;
    #[Rule('required|sometimes|image|max:1024')]
    public $foto;

    public function add()
    {
        $validate = $this->validate();
        if ($this->foto) {
            $filename = time() . '.' . $this->foto->getClientOriginalExtension();
            $validate['foto'] = $this->foto->storeAs('/prestasi', $filename, 'public_uploads');
        }
        $data = [
            'title' => $this->title,
            'description' => $this->description,
            'foto' => $filename = time() . '.' . $this->foto->getClientOriginalExtension(),
            'created_at' => now(),
        ];
        // dd($data);
        Prestasi::insert($data);
        return $this->redirect('/panel-admin/prestasi', navigate:true);
    }
    public function render()
    {
        return view('livewire.admin.prestasi.add-prestasi');
    }
}
