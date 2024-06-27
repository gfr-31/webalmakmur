<?php

namespace App\Livewire\Admin\Prestasi;

use App\Models\Prestasi;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;

class EditPrestasi extends Component
{
    use WithFileUploads;

    #[Layout('components.layouts.admin')]
    #[Title('Panel Admin | Edit-Prestasi')]

    #[Rule('required|min:3|max:50')]
    public $title;
    #[Rule('required|min:15|max:255')]
    public $description;
    #[Rule('nullable|sometimes|image|mimes:jpeg,png,jpg|max:1024')]
    public $foto;
    public $currentFoto;
    public $prestasiId;

    public function mount($id)
    {
        $prestasi = Prestasi::find($id);
        $this->title = $prestasi->title;
        $this->description = $prestasi->description;
        $this->currentFoto = $prestasi->foto;
        $this->prestasiId = $prestasi->id;
    }

    public function update()
    {
        $validate = $this->validate();
        // dd($this->all());
        $prestasi = Prestasi::find($this->prestasiId);

        if ($this->foto) {
            // Hapus foto lama jika ada
            if ($this->currentFoto && File::exists(public_path('uploads/prestasi/' . $this->currentFoto))) {
                File::delete(public_path('uploads/prestasi/' . $this->currentFoto));
            }

            $filename = time() . '.' . $this->foto->getClientOriginalExtension();
            $this->foto->storeAs('/prestasi', $filename, 'public_uploads');
            $prestasi->foto = $filename;
            $this->currentFoto = $filename;
        }

        $prestasi->title = $this->title;
        $prestasi->description = $this->description;
        $prestasi->save();
        return $this->redirect('/panel-admin/prestasi', navigate: true);
    }

    public function render()
    {
        return view('livewire.admin.prestasi.edit-prestasi',);
    }
}
