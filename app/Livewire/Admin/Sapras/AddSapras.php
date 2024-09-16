<?php

namespace App\Livewire\Admin\Sapras;

use App\Models\Sapras;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\WithFileUploads;
use Carbon\Carbon;

class AddSapras extends Component
{
    use WithFileUploads;

    #[Layout('components.layouts.admin')]
    #[Title('Panel Admin | Add Sarana Prasarana')]

    #[Rule('required|min:3|max:50')]
    public $name;
    #[Rule('required')]
    public $condition;
    #[Rule('required')]
    public $total;
    #[Rule('required|sometimes')]
    public $foto = [];

    public function add()
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

        $data = [
            'name' => $this->name,
            'condition' => $this->condition,
            'total' => $this->total,
            'foto' => json_encode($fotoArray),
            'created_at' => now(),
        ];
        // dd($data);
        Sapras::insert($data);
        notyf()->position('y', 'top')->dismissible(true)->ripple(true)->duration(3000)->addSuccess('Data saved successfully');
        return $this->redirect('/panel-admin/sarana-prasarana', navigate: true);
    }

    public function render()
    {
        return view('livewire.admin.sapras.add-sapras');
    }
}