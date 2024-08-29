<?php

namespace App\Livewire\Admin\Gallery;

use App\Models\Gallery;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\WithFileUploads;
use Carbon\Carbon;

class AddGallery extends Component
{
    use WithFileUploads;

    #[Layout('components.layouts.admin')]
    #[Title('Panel Admin | Add-Gallery')]

    #[Rule('required|min:3|max:50')]
    public $title;
    #[Rule('required|min:15|max:255')]
    public $description;
    #[Rule('required|sometimes')]
    public $foto = [];

    public function add()
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

        $data = [
            'judul' => $this->title,
            'description' => $this->description,
            'foto' => json_encode($fotoArray),
            'created_at' => now(),
        ];
        // dd($data);
        Gallery::insert($data);
        return $this->redirect('/panel-admin/gallery', navigate: true);
    }

    public function render()
    {
        return view('livewire.admin.gallery.add-gallery');
    }
}
