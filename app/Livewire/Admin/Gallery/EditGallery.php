<?php

namespace App\Livewire\Admin\Gallery;

use App\Models\Gallery;
use Carbon\Carbon;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;

class EditGallery extends Component
{
    use WithFileUploads;

    #[Layout('components.layouts.admin')]
    #[Title('Panel Admin | Edit-Gallery')]

    #[Rule('required|min:3|max:50')]
    public $title;
    #[Rule('required|min:15|max:255')]
    public $description;
    #[Rule('nullable|sometimes')]
    public $foto = [];
    public $currentFoto;
    public $galleryId;
    public function mount($id)
    {
        $gallery = Gallery::find($id);
        $this->title = $gallery->judul;
        $this->description = $gallery->description;
        $this->galleryId = $gallery->id;
        $this->currentFoto = $gallery->foto;
        $this->id = $id;
        // dd($this->all());
    }

    public function showModal()
    {
        $this->dispatch('show-modal');
    }

    public function deleteFoto($key)
    {
        $this->currentFoto = array_filter($this->currentFoto, function ($photo) use ($key) {
            return $photo['key'] !== $key;
        });
        $this->currentFoto = array_values($this->currentFoto);
        Gallery::where('id', $this->galleryId)->update(['foto' => json_encode($this->currentFoto)]);
        // dd($this->currentFoto);
    }

    public function addFoto()
    {
        $validate = $this->validate();
        $fotoArray = [];
        date_default_timezone_set('Asia/Jakarta');
        Carbon::setLocale('id');
        $date = Carbon::now()->translatedFormat('l, d-m-Y H:i:s');
        if ($this->foto) {
            foreach ($this->foto as $file) {
                $rondomKey = md5(uniqid(rand(), true));
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('/gallery', $filename, 'public_uploads');

                $fotoArray[] = [
                    'key' => $rondomKey,
                    'filename' => $filename,
                    'date' => $date,
                ];
            }
        }

        $db = Gallery::find($this->galleryId);
        $currentFoto = $db->foto;
        if (is_string($currentFoto)) {
            $currentFoto = json_decode($currentFoto, true);
        }
        $currentFoto = $currentFoto ?? [];
        $updatedFoto = array_merge($currentFoto, $fotoArray);
        // dd($updatedFoto);
        Gallery::where('id', $this->galleryId)->update(['foto' => json_encode($updatedFoto)]);
        $this->currentFoto = $updatedFoto;
        $this->dispatch('close-modal');
        $this->reset('foto');
    }

    public function update()
    {
        $gallery = Gallery::find($this->galleryId);
        $gallery->judul = $this->title;
        $gallery->description = $this->description;
        $gallery->save();
        return $this->redirect('/panel-admin/gallery', navigate: true);
    }
    public function render()
    {
        return view('livewire.admin.gallery.edit-gallery');
    }
}
