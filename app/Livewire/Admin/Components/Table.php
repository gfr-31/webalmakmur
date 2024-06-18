<?php

namespace App\Livewire\Admin\Components;

use App\Models\DataGuru;
use App\Models\Eskul;
use App\Models\Gallery;
use App\Models\Prestasi;
use App\Models\Sapras;
use App\Models\User;
use Livewire\Component;

class Table extends Component
{
    public $title;
    public $data;

    public function mount($page)
    {
        if ($page === 'prestasi') {
            $this->title = 'Data Prestasi';
            $this->data = Prestasi::all();
        } elseif ($page === 'eskul') {
            $this->title = 'Data Ekstrakulikuler';
            $this->data = Eskul::all();
        } elseif ($page === 'gallery') {
            $this->title = 'Data Gallery';
            $this->data = Gallery::all();
        } elseif ($page === 'data-guru') {
            $this->title = 'Data Guru';
            $this->data = DataGuru::all();
        } elseif ($page === 'sapras') {
            $this->title = 'Data Sarana-Prasarana';
            $this->data = Sapras::all();
        } elseif ($page === 'user-admin') {
            $this->title = 'Data User-Admim';
            $this->data = User::all();
        }
    }
    public function render()
    {
        return view('livewire.admin.components.table');
    }
}
