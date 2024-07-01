<?php

namespace App\Livewire\Admin;

use App\Models\Gallery as ModelsGallery;
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
            for ($i = 0; $i < count($this->select); $i++) {
                $gallery = ModelsGallery::find($this->select[$i]);
                $gallery->delete();
            }
        }
        $this->select = [];
        $this->selectAll = false;
        $this->gotoPage(1);
    }
    public function delete($id)
    {
        $this->selectAll = false;
        $gallery = ModelsGallery::find($id);
        $gallery->delete();
    }
    public function render()
    {
        if ($this->search != null) {
            $gallery = ModelsGallery::where('title', 'like', '%' . $this->search . '%')
                ->orWhere('description', 'like', '%' . $this->search . '%')
                ->orWhere('created_at', 'like', '%' . $this->search . '%')
                ->orWhere('updated_at', 'like', '%' . $this->search . '%')
                ->orderBy('id', 'desc')
                ->paginate($this->pagin);
            $this->firstId = $gallery->isNotEmpty() ? $gallery->first()->id : null;
        } else {
            $gallery = ModelsGallery::orderBy('id', 'desc')->paginate($this->pagin);
            $this->firstId = $gallery->isNotEmpty() ? $gallery->first()->id : null;
        }
        return view('livewire.admin.gallery', [
            'gallery' => $gallery,
        ]);
    }
}
