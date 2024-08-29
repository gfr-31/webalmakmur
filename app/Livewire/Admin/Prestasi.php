<?php

namespace App\Livewire\Admin;

use App\Models\Prestasi as ModelsPrestasi;
use File;
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
        $this->gotoPage(1);
    }

    public function updatedSearch()
    {
        $this->gotoPage(1);
    }

    public function updatedSelectAll($value)
    {
        if ($value) {
            $this->select = ModelsPrestasi::orderBy('id', 'desc')
                ->where('id', '<=', $this->firstId)
                ->limit($this->pagin)
                ->pluck('id');
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
            foreach ($this->select as $id) {
                $prestasi = ModelsPrestasi::find($id);
                $nameFoto = ModelsPrestasi::where('id', $id)->pluck('foto')->first();
                $prestasi->delete();
                File::delete(public_path('uploads/prestasi/' . $nameFoto));
            }
        }
        $this->resetSelected();
        $this->gotoPage(1);
        notyf()->position('y', 'top')->duration(3000)->ripple(true)->dismissible(true)->addSuccess('The selected data was deleted successfully');
    }

    public function delete($id)
    {
        $this->selectAll = false;
        $prestasi = ModelsPrestasi::find($id);
        $nameFoto = ModelsPrestasi::where('id', $id)->pluck('foto')->first();
        $prestasi->delete();
        File::delete(public_path('uploads/prestasi/' . $nameFoto));
        notyf()->position('y', 'top')->duration(3000)->ripple(true)->dismissible(true)->addSuccess('Data deleted successfully');
    }

    public function render()
    {
        if ($this->search) {
            $prestasi = ModelsPrestasi::where('title', 'like', '%' . $this->search . '%')
                ->orWhere('description', 'like', '%' . $this->search . '%')
                ->orWhere('created_at', 'like', '%' . $this->search . '%')
                ->orWhere('updated_at', 'like', '%' . $this->search . '%')
                ->orderBy('id', 'desc')
                ->paginate($this->pagin);
        } else {
            $prestasi = ModelsPrestasi::orderBy('id', 'desc')->paginate($this->pagin);
        }
        $this->firstId = $prestasi->isNotEmpty() ? $prestasi->first()->id : null;

        return view('livewire.admin.prestasi', [
            'prestasi' => $prestasi,
        ]);
    }
}
