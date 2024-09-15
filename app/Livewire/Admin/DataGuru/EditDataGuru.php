<?php

namespace App\Livewire\Admin\DataGuru;

use App\Models\DataGuru;
use File;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditDataGuru extends Component
{
    use WithFileUploads;

    #[Layout('components.layouts.admin')]
    #[Title('Panel Admin | Edit Data Guru')]

    #[Rule('required')]
    public $name;
    #[Rule('required')]
    public $position;
    #[Rule('required')]
    public $relegion;
    #[Rule('required')]
    public $gender;
    #[Rule('nullable|sometimes|image|mimes:jpeg,png,jpg')]
    public $foto;
    public $currentFoto;
    public $dataGuruId;
    public $oldData;

    public function mount($id)
    {
        $dataGuru = DataGuru::find($id);
        $this->name = $dataGuru->name;
        $this->position = $dataGuru->jabatan;
        $this->relegion = $dataGuru->agama;
        $this->gender = $dataGuru->jk;
        $this->currentFoto = $dataGuru->foto;
        $this->dataGuruId = $dataGuru->id;
        $this->oldData = [
            'name' => $dataGuru->name,
            'position' => $dataGuru->jabatan,
            'relegion' => $dataGuru->agama,
            'gender' => $dataGuru->jk,
            'currentFoto' => $dataGuru->currentFoto,
        ];
        // dd($this->oldData);
    }

    public function update()
    {
        // dd($this->all());
        $this->validate();
        $newData = [
            'name' => $this->name,
            'position' => $this->position,
            'relegion' => $this->relegion,
            'gender' => $this->gender,
            'currentFoto' => $this->foto,
        ];

        if ($newData !== $this->oldData) {
            $dataGuru = DataGuru::find($this->dataGuruId);
            if ($this->foto) {
                // Hapus foto lama jika ada
                if ($this->currentFoto && File::exists(public_path('uploads/dataGuru/' . $this->currentFoto))) {
                    File::delete(public_path('uploads/dataGuru/' . $this->currentFoto));
                }
                $filename = time() . '.' . $this->foto->getClientOriginalExtension();
                $this->foto->storeAs('/dataGuru', $filename, 'public_uploads');
                $dataGuru->foto = $filename;
                $this->currentFoto = $filename;
            }
            $dataGuru->name = $this->name;
            $dataGuru->jabatan = $this->position;
            $dataGuru->agama = $this->relegion;
            $dataGuru->jk = $this->gender;
            $dataGuru->save();
            // dd($dataGuru);
            notyf()->position('y', 'top')->duration(3000)->ripple(true)->dismissible(true)->addSuccess('Data successfully updated');
            return $this->redirect('/panel-admin/data-guru', navigate: true);
        } else {
            notyf()->position('y', 'top')->duration(3000)->ripple(true)->dismissible(true)->addInfo('No data updates');
            return $this->redirect('/panel-admin/data-guru', navigate: true);
            // dd('old data');
        }
    }

    public function render()
    {
        return view('livewire.admin.data-guru.edit-data-guru');
    }
}
