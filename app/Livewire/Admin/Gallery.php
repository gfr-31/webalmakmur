<?php

namespace App\Livewire\Admin;

use App\Models\Gallery as ModelsGallery;
use File;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class Gallery extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['resetMySelected' => 'resetSelected'];
    #[Layout('components.layouts.admin')]
    #[Title('Panel Admin | Gallery')]

    public $select = [];
    public $selectAll = false;
    public $firstId = NULL;
    public $entries = 10;
    public $pagin = 10;
    public $search;

    public function updatedEntries()
    {
        $this->pagin = $this->entries;
        $this->gotoPage(1);
        // dd($this->pagin);
    }
    public function updatedSearch()
    {
        $this->gotoPage(1);
        $this->selectAll = false;
        $this->select = [];
    }
    public function updatedSelectAll($value)
    {
        if ($value) {
            $this->select = ModelsGallery::orderBy('id', 'desc')->where('id', '<=', $this->firstId)->limit($this->pagin)->pluck('id');
        } else {
            $this->select = [];
        }
    }
    public function resetSelected()
    {
        $this->selectAll = false;
        $this->select = [];
    }
    public function deleteAll()
    {

        if (count($this->select)) {
            foreach ($this->select as $id) {
                $gallery = ModelsGallery::find($id);
                $nameFoto = ModelsGallery::where('id', $id)->pluck('foto')->first();

                $fileNames = array_map(function ($foto) {
                    return $foto['filename'];
                }, $nameFoto);

                $gallery->delete();

                foreach ($fileNames as $names) {
                    File::delete(public_path('uploads/gallery/' . $names));
                }
            }
        }
        $this->resetSelected();
        $this->gotoPage(1);
        notyf()->position('y', 'top')->duration(3000)->ripple(true)->dismissible(true)->addSuccess('The selected data was deleted successfully');
    }
    public function delete($id)
    {
        $this->selectAll = false;
        $gallery = ModelsGallery::find($id);
        $nameFoto = ModelsGallery::where('id', $id)->pluck('foto')->first();

        $fileNames = array_map(function ($foto) {
            return $foto['filename'];
        }, $nameFoto);
        $gallery->delete();

        foreach ($fileNames as $names) {
            File::delete(public_path('uploads/gallery/' . $names));
        }
        notyf()->position('y', 'top')->duration(3000)->ripple(true)->dismissible(true)->addSuccess('Data deleted successfully');
    }
    public function render()
    {
        if ($this->search != null) {
            $gallery = ModelsGallery::where('judul', 'like', '%' . $this->search . '%')
                ->orWhere('description', 'like', '%' . $this->search . '%')
                ->orWhere('created_at', 'like', '%' . $this->search . '%')
                ->orWhere('updated_at', 'like', '%' . $this->search . '%')
                ->orderBy('id', 'desc')
                ->paginate($this->pagin);
        } else {
            $gallery = ModelsGallery::orderBy('id', 'desc')->paginate($this->pagin);
        }
        $this->firstId = $gallery->isNotEmpty() ? $gallery->first()->id : null;

        return view('livewire.admin.gallery', [
            'gallery' => $gallery,
        ]);
    }
}
