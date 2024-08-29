<?php

namespace App\Livewire\Admin;

use App\Models\Eskul as ModelsEskul;
use File;
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
            foreach ($this->select as $id) {
                $eskul = ModelsEskul::find($id);
                $nameFoto = ModelsEskul::where('id', $id)->pluck('foto')->first();
                $eskul->delete();
                File::delete(public_path('uploads/eskul/' . $nameFoto));
            }
        }
        $this->resetSelected();
        $this->gotoPage(1);
        notyf()->position('y', 'top')->duration(3000)->ripple(true)->dismissible(true)->addSuccess('The selected data was deleted successfully');
    }
    public function delete($id)
    {
        $this->selectAll = false;
        $eskul = ModelsEskul::find($id);
        $nameFoto = ModelsEskul::where('id', $id)->pluck('foto')->first();
        $eskul->delete();
        File::delete(public_path('uploads/eskul/' . $nameFoto));
        notyf()->position('y', 'top')->duration(3000)->ripple(true)->dismissible(true)->addSuccess('Data deleted successfully');
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
