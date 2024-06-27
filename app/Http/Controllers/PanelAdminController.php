<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PanelAdminController extends Controller
{
    public function index(){
        return view('livewire.admin.home');
    }

    // Prestasi
    public function prestasi(){
        return view('livewire.admin.prestasi');
    }
    public function addPrestasi(){
        return view('livewire.admin.prestasi.add-prestasi');
    }
    public function ekstrakulikuler(){
        return view('livewire.admin.eskul');
    }
    public function gallery(){
        return view('livewire.admin.gallery');
    }
    public function dataGuru(){
        return view('livewire.admin.data-guru');
    }
    public function saranaPrasarana(){
        return view('livewire.admin.sapras');
    }
    public function contact(){
        return view('livewire.admin.contact');
    }
    public function userAdmin(){
        return view('livewire.admin.user-admin');
    }
}
