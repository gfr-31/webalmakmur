<?php

namespace App\Livewire\Admin\Eskul;

use App\Models\Eskul;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddEskul extends Component
{
    use WithFileUploads;

    #[Layout('components.layouts.admin')]
    #[Title('Panel Admin | Add-Ekstrakulikuler')]

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
            $validate['foto'] = $this->foto->storeAs('/eskul', $filename, 'public_uploads');
        }
        $data = [
            'title' => $this->title,
            'description' => $this->description,
            'foto' => $filename = time() . '.' . $this->foto->getClientOriginalExtension(),
            'created_at' => now(),
        ];
        // dd($data);
        Eskul::insert($data);
        notyf()->position('y', 'top')->dismissible(true)->ripple(true)->duration(3000)->addSuccess('Data saved successfully');
        return $this->redirect('/panel-admin/ekstrakulikuler', navigate: true);
    }
    public function render()
    {
        return view('livewire.admin.eskul.add-eskul');
    }
}
