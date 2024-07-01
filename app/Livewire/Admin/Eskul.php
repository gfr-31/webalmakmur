<?php

namespace App\Livewire\Admin;

use App\Models\Eskul as ModelsEskul;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class Eskul extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['resetMySelected' => 'resetSelected'];
    #[Layout('components.layouts.admin')]
    #[Title('Panel Admin | Ekstrakulikuler')]

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
            $this->select = ModelsEskul::orderBy('id', 'desc')->where('id', '<=', $this->firstId)->limit($this->pagin)->pluck('id');
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
                $eskul = ModelsEskul::find($this->select[$i]);
                $eskul->delete();
            }
        }
        $this->select = [];
        $this->selectAll = false;
        $this->gotoPage(1);
    }
    public function delete($id)
    {
        $this->selectAll = false;
        $eskul = ModelsEskul::find($id);
        $eskul->delete();
    }
    public function render()
    {
        if ($this->search != null) {
            $eskul = ModelsEskul::where('title', 'like', '%' . $this->search . '%')
                ->orWhere('description', 'like', '%' . $this->search . '%')
                ->orWhere('created_at', 'like', '%' . $this->search . '%')
                ->orWhere('updated_at', 'like', '%' . $this->search . '%')
                ->orderBy('id', 'desc')
                ->paginate($this->pagin);
            $this->firstId = $eskul->isNotEmpty() ? $eskul->first()->id : null;
        } else {
            $eskul = ModelsEskul::orderBy('id', 'desc')->paginate($this->pagin);
            $this->firstId = $eskul->isNotEmpty() ? $eskul->first()->id : null;
        }
        return view('livewire.admin.eskul', [
            'eskul' => $eskul,
        ]);
    }
}
