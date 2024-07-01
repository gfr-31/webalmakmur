<?php

namespace App\Livewire\Admin\Eskul;

use App\Models\Eskul;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;

class EditEskul extends Component
{
    use WithFileUploads;

    #[Layout('components.layouts.admin')]
    #[Title('Panel Admin | Edit-Eskul')]

    #[Rule('required|min:3|max:50')]
    public $title;
    #[Rule('required|min:15|max:255')]
    public $description;
    #[Rule('nullable|sometimes|image|mimes:jpeg,png,jpg|max:1024')]
    public $foto;
    public $currentFoto;
    public $eskulId;

    public function mount($id)
    {
        $eskul = Eskul::find($id);
        $this->title = $eskul->title;
        $this->description = $eskul->description;
        $this->currentFoto = $eskul->foto;
        $this->eskulId = $eskul->id;
    }

    public function update()
    {
        $validate = $this->validate();
        // dd($this->all());
        $eskul = Eskul::find($this->eskulId);

        if ($this->foto) {
            // Hapus foto lama jika ada
            if ($this->currentFoto && File::exists(public_path('uploads/eskul/' . $this->currentFoto))) {
                File::delete(public_path('uploads/eskul/' . $this->currentFoto));
            }

            $filename = time() . '.' . $this->foto->getClientOriginalExtension();
            $this->foto->storeAs('/eskul', $filename, 'public_uploads');
            $eskul->foto = $filename;
            $this->currentFoto = $filename;
        }

        $eskul->title = $this->title;
        $eskul->description = $this->description;
        $eskul->save();
        return $this->redirect('/panel-admin/ekstrakulikuler', navigate: true);
    }

    public function render()
    {
        return view('livewire.admin.eskul.edit-eskul',);
    }
}
