<?php

namespace App\Livewire\Admin;

use App\Models\Sapras as ModelsSapras;
use File;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class Sapras extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['resetMySelected' => 'resetSelected'];
    #[Layout('components.layouts.admin')]
    #[Title('Panel Admin | Sarana Prasarana')]

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
            $this->select = ModelsSapras::orderBy('id', 'desc')->where('id', '<=', $this->firstId)->limit($this->pagin)->pluck('id');
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
                $sapras = ModelsSapras::find($id);
                $nameFoto = ModelsSapras::where('id', $id)->pluck('foto')->first();

                $dataArray = json_decode($nameFoto, true);
                $fileNames = array_map(function ($foto) {
                    return $foto['filename'];
                }, $dataArray);

                $sapras->delete();

                foreach ($fileNames as $names) {
                    File::delete(public_path('uploads/sapras/' . $names));
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
        $sapras = ModelsSapras::find($id);
        $nameFoto = ModelsSapras::where('id', $id)->pluck('foto')->first();

        $dataArray = json_decode($nameFoto, true);
        $fileNames = array_map(function ($foto) {
            return $foto['filename'];
        }, $dataArray);
        $sapras->delete();

        foreach ($fileNames as $names) {
            File::delete(public_path('uploads/sapras/' . $names));
        }
        notyf()->position('y', 'top')->duration(3000)->ripple(true)->dismissible(true)->addSuccess('Data deleted successfully');
    }
    public function render()
    {
        if ($this->search != null) {
            $sapras = ModelsSapras::where('name', 'like', '%' . $this->search . '%')
                ->orWhere('condition', 'like', '%' . $this->search . '%')
                ->orWhere('total', 'like', '%' . $this->search . '%')
                ->orWhere('created_at', 'like', '%' . $this->search . '%')
                ->orWhere('updated_at', 'like', '%' . $this->search . '%')
                ->orderBy('id', 'desc')
                ->paginate($this->pagin);
        } else {
            $sapras = ModelsSapras::orderBy('id', 'desc')->paginate($this->pagin);
        }
        $this->firstId = $sapras->isNotEmpty() ? $sapras->first()->id : null;

        return view('livewire.admin.sapras', [
            'sapras' => $sapras,
        ]);
    }
}