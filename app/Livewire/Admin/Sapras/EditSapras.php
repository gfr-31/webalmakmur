<?php

namespace App\Livewire\Admin\Sapras;

use File;
use App\Models\Sapras;
use Carbon\Carbon;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditSapras extends Component
{
    use WithFileUploads;

    #[Layout('components.layouts.admin')]
    #[Title('Panel Admin | Edit Sarana Prasarana')]

    #[Rule('required|min:3|max:50')]
    public $name;
    #[Rule('required')]
    public $condition;
    #[Rule('required')]
    public $total;
    #[Rule('nullable|sometimes')]
    public $foto = [];
    public $currentFoto;
    public $saprasId;
    public $oldData;

    public function mount($id)
    {
        $sapras = Sapras::find($id);
        $this->name = $sapras->name;
        $this->condition = $sapras->condition;
        $this->total = $sapras->total;
        $this->saprasId = $sapras->id;
        $this->currentFoto = $sapras->foto;
        $this->id = $id;
        $this->oldData = [
            'name' => $this->name,
            'condition' => $this->condition,
            'total' => $this->total,
        ];
        // dd($this->all());
    }

    public function showModal()
    {
        $this->dispatch('show-modal');
    }

    public function deleteFoto($key)
    {
        $this->currentFoto = json_decode($this->currentFoto, true);
        $fileName = array_filter($this->currentFoto, function ($photo) use ($key) {
            return $photo['key'] === $key;
        });

        $this->currentFoto = array_filter($this->currentFoto, function ($photo) use ($key) {
            return $photo['key'] !== $key;
        });
        $this->currentFoto = array_values($this->currentFoto);
        Sapras::where('id', $this->saprasId)->update(['foto' => json_encode($this->currentFoto)]);

        $fileName = reset($fileName);
        File::delete(public_path('uploads/sapras/' . $fileName['filename']));
        $this->currentFoto = json_encode($this->currentFoto);

        notyf()->position('y', 'top')->duration(3000)->ripple(true)->dismissible(true)->addSuccess('Photo successfully deleted');
    }

    public function addFoto()
    {
        $this->validate();
        $fotoArray = [];
        date_default_timezone_set('Asia/Jakarta');
        Carbon::setLocale('id');
        $date = Carbon::now()->translatedFormat('l, d-m-Y H:i:s');
        if ($this->foto) {
            foreach ($this->foto as $file) {
                $rondomKey = md5(uniqid(rand(), true));
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('/sapras', $filename, 'public_uploads');

                $fotoArray[] = [
                    'key' => $rondomKey,
                    'filename' => $filename,
                    'date' => $date,
                ];
            }
        }

        $db = Sapras::find($this->saprasId);
        $currentFoto = $db->foto;
        if (is_string($currentFoto)) {
            $currentFoto = json_decode($currentFoto, true);
        }

        $currentFoto = $currentFoto ?? [];
        $updatedFoto = array_merge($currentFoto, $fotoArray);

        // dd($updatedFoto);
        Sapras::where('id', $this->saprasId)->update(['foto' => json_encode($updatedFoto)]);

        $this->currentFoto = $updatedFoto;
        notyf()->position('y', 'top')->dismissible(true)->ripple(true)->duration(3000)->addSuccess('Photo added successfully');
        $this->currentFoto = json_encode($this->currentFoto);

        $this->dispatch('close-modal');
        $this->reset('foto');
    }

    public function update()
    {
        // dd(123);
        $this->validate();
        $newData = [
            'name' => $this->name,
            'condition' => $this->condition,
            'total' => $this->total,
            // 'currentFoto' => $this->,
        ];

        if ($newData !== $this->oldData) {
            $sapras = Sapras::find($this->saprasId);
            $sapras->name = $this->name;
            $sapras->condition = $this->condition;
            $sapras->total = $this->total;
            $sapras->save();
            notyf()->position('y', 'top')->duration(3000)->ripple(true)->dismissible(true)->addSuccess('Data successfully updated');
            return $this->redirect('/panel-admin/sarana-prasarana', navigate: true);
        } else {
            notyf()->position('y', 'top')->duration(3000)->ripple(true)->dismissible(true)->addInfo('No data updates');
            return $this->redirect('/panel-admin/sarana-prasarana', navigate: true);
        }

    }

    public function render()
    {
        return view('livewire.admin.sapras.edit-sapras');
    }
}
