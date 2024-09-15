<?php

namespace App\Livewire\Admin\DataGuru;

use App\Models\DataGuru;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddDataGuru extends Component
{
    use WithFileUploads;
    #[Layout('components.layouts.admin')]
    #[Title('Panel Admin | Add Data Guru')]

    #[Rule('required')]
    public $name;
    #[Rule('required')]
    public $position;
    #[Rule('required')]
    public $relegion;
    #[Rule('required')]
    public $gender;
    #[Rule('required|sometimes|image|max:1024')]
    public $foto;

    public function add()
    {
        $this->validate();
        if ($this->foto) {
            $filename = time() . '.' . $this->foto->getClientOriginalExtension();
            $validate['foto'] = $this->foto->storeAs('/dataGuru', $filename, 'public_uploads');
        }
        $data = [
            'name' => $this->name,
            'jabatan' => $this->position,
            'agama' => $this->relegion,
            'jk' => $this->gender,
            'foto' => $filename = time() . '.' . $this->foto->getClientOriginalExtension(),
            'created_at' => now(),
        ];
        // dd($data);
        DataGuru::insert($data);
        notyf()->position('y', 'top')->dismissible(true)->ripple(true)->duration(3000)->addSuccess('Data saved successfully');
        return $this->redirect('/panel-admin/data-guru', navigate: true);
    }

    public function render()
    {
        return view('livewire.admin.data-guru.add-data-guru');
    }
}
