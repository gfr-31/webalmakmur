<?php

namespace App\Livewire\Admin\Components;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Header extends Component
{
    public function logout()
    {
        Auth::logout();
        // session()->flash('message', 'Log Out Successful');
        notyf()->position('y', 'top')->duration(3000)->ripple(true)->dismissible(true)->addSuccess('You are successfully logged out');
        return $this->redirect('/login-admin', navigate: true);
    }
    public function render()
    {
        return view('livewire.admin.components.header');
    }
}
