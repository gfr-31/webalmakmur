<?php

namespace App\Livewire\Admin;

use App\Models\Prestasi as ModelsPrestasi;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class Prestasi extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['resetMySelected' => 'resetSelected'];
    #[Layout('components.layouts.admin')]
    #[Title('Panel Admin | Prestasi')]

    public $select = [];
    public $selectAll = false;
    public $firstId = NULL;
    public $entries = 10;
    public $pagin = 10;
    public $search;


    public function updatedEntries()
    {
        $this->pagin = $this->entries;
        // dd($this->pagin);
    }
    public function updatedSearch()
    {
        $this->gotoPage(1);
    }
    public function updatedSelectAll($value)
    {
        if ($value) {
            $this->select = ModelsPrestasi::where('id', '>=', $this->firstId)->limit($this->pagin)->pluck('id');
        } else {
            $this->select = [];
        }
    }
    public function resetSelected()
    {
        $this->select = [];
        $this->selectAll = false;
    }
    public function deleteAll()
    {
        if (count($this->select)) {
            for ($i = 0; $i < count($this->select); $i++) {
                $prestasi = ModelsPrestasi::find($this->select[$i]);
                $prestasi->delete();
            }
        }
        $this->select = [];
        $this->selectAll = false;
        $this->gotoPage(1);
    }
    public function delete($id)
    {
        $this->selectAll = false;
        $prestasi = ModelsPrestasi::find($id);
        $prestasi->delete();
    }
    public function render()
    {
        if ($this->search != null) {
            $prestasi = ModelsPrestasi::where('title', 'like', '%' . $this->search . '%')
                ->orWhere('description', 'like', '%' . $this->search . '%')
                ->orWhere('created_at', 'like', '%' . $this->search . '%')
                ->orWhere('updated_at', 'like', '%' . $this->search . '%')
                ->orderBy('created_at', 'desc')
                ->paginate($this->pagin);
            $this->firstId = $prestasi->isNotEmpty() ? $prestasi->first()->id : null;
        } else {
            $prestasi = ModelsPrestasi::orderBy('created_at', 'desc')->paginate($this->pagin);
            $this->firstId = $prestasi->isNotEmpty() ? $prestasi->first()->id : null;
        }
        return view('livewire.admin.prestasi', [
            'prestasi' => $prestasi,
        ]);
    }
}
