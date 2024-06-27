<?php

namespace App\Livewire\Admin\Components;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Header extends Component
{
    public function logout()
    {
        Auth::logout();
        session()->flash('message', 'Log Out Successful');
        return $this->redirect('/login-admin', navigate:true);
    }
    public function render()
    {
        return view('livewire.admin.components.header');
    }
}
