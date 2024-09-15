<?php

namespace App\Livewire\Admin\Gallery;

use File;
use App\Models\Gallery;
use Carbon\Carbon;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;
// use Illuminate\Support\Facades\File;

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
    public $oldData;

    public function mount($id)
    {
        $gallery = Gallery::find($id);
        $this->title = $gallery->judul;
        $this->description = $gallery->description;
        $this->galleryId = $gallery->id;
        $this->currentFoto = $gallery->foto;
        $this->id = $id;
        $this->oldData = [
            'judul' => $this->title,
            'description' => $this->description,
        ];
        // dd($this->all());
    }

    public function showModal()
    {
        $this->dispatch('show-modal');
    }

    public function deleteFoto($key)
    {
        $fileName = array_filter($this->currentFoto, function ($photo) use ($key) {
            return $photo['key'] === $key;
        });

        $this->currentFoto = array_filter($this->currentFoto, function ($photo) use ($key) {
            return $photo['key'] !== $key;
        });
        $this->currentFoto = array_values($this->currentFoto);
        Gallery::where('id', $this->galleryId)->update(['foto' => json_encode($this->currentFoto)]);

        $fileName = reset($fileName);
        File::delete(public_path('uploads/gallery/' . $fileName['filename']));

        notyf()->position('y', 'top')->duration(3000)->ripple(true)->dismissible(true)->addSuccess('Photo successfully deleted');
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
        notyf()->position('y', 'top')->dismissible(true)->ripple(true)->duration(3000)->addSuccess('Photo added successfully');
        $this->dispatch('close-modal');
        $this->reset('foto');
        // return $this->redirect('/panel-admin/gallery/' . $this->galleryId . '/edit-gallery', navigate: true);
    }

    public function update()
    {
        $this->validate();
        $newData = [
            'judul' => $this->title,
            'description' => $this->description,
            // 'currentFoto' => $this->,
        ];

        if ($newData !== $this->oldData) {
            $gallery = Gallery::find($this->galleryId);
            $gallery->judul = $this->title;
            $gallery->description = $this->description;
            $gallery->save();
            notyf()->position('y', 'top')->duration(3000)->ripple(true)->dismissible(true)->addSuccess('Data successfully updated');
            return $this->redirect('/panel-admin/gallery', navigate: true);
        } else {
            notyf()->position('y', 'top')->duration(3000)->ripple(true)->dismissible(true)->addInfo('No data updates');
            return $this->redirect('/panel-admin/gallery', navigate: true);
        }

    }
    public function render()
    {
        return view('livewire.admin.gallery.edit-gallery');
    }
}
