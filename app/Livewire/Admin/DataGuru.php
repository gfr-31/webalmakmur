<?php

namespace App\Livewire\Admin;

use App\Models\DataGuru as ModelsDataGuru;
use File;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class DataGuru extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['resetMySelected' => 'resetSelected'];

    #[Layout('components.layouts.admin')]
    #[Title('Panel Admin | Data Guru')]

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
            $this->select = ModelsDataGuru::orderBy('id', 'desc')
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
                $dataGuru = ModelsDataGuru::find($id);
                $nameFoto = ModelsDataGuru::where('id', $id)->pluck('foto')->first();
                $dataGuru->delete();
                File::delete(public_path('uploads/dataGuru/' . $nameFoto));
            }
        }
        $this->resetSelected();
        $this->gotoPage(1);
        notyf()->position('y', 'top')->duration(3000)->ripple(true)->dismissible(true)->addSuccess('The selected data was deleted successfully');
    }

    public function delete($id)
    {
        $this->selectAll = false;
        $dataGuru = ModelsDataGuru::find($id);
        $nameFoto = ModelsDataGuru::where('id', $id)->pluck('foto')->first();
        $dataGuru->delete();
        File::delete(public_path('uploads/dataGuru/' . $nameFoto));
        notyf()->position('y', 'top')->duration(3000)->ripple(true)->dismissible(true)->addSuccess('Data deleted successfully');
    }

    public function render()
    {
        if ($this->search) {
            $dataGuru = ModelsDataGuru::where('name', 'like', '%' . $this->search . '%')
                ->orWhere('jk', 'like', '%' . $this->search . '%')
                ->orWhere('agama', 'like', '%' . $this->search . '%')
                ->orWhere('jabatan', 'like', '%' . $this->search . '%')
                ->orWhere('created_at', 'like', '%' . $this->search . '%')
                ->orWhere('updated_at', 'like', '%' . $this->search . '%')
                ->paginate($this->pagin);
        } else {
            $dataGuru = ModelsDataGuru::orderBy('id', 'desc')->paginate($this->pagin);
        }
        $this->firstId = $dataGuru->isNotEmpty() ? $dataGuru->first()->id : null;
        return view('livewire.admin.data-guru', [
            'dataGuru' => $dataGuru
        ]);
    }
}
