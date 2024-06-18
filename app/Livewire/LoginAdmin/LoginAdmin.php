<?php

namespace App\Livewire\LoginAdmin;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class LoginAdmin extends Component
{

    public $password;
    public $username;
    public $showPassword = false;
    protected $rules = [
        'username' => 'required',
        'password' => 'required',
    ];

    public function login()
    {
        $this->validate();

        if (Auth::attempt([
            'name' => $this->username,
            'password' => $this->password,
        ])) {
            session()->flash('message', 'Log In Successful');
            return redirect()->intended('/panel-admin');
            // $this->dispatch('loginSuccess');
        } else {
            $this->username = "";
            $this->password = "";
            session()->flash('error', 'Your Username or Password is incorrect');
        };
        // dd($this->username);
    }
    public function render()
    {
        return view('livewire.login-admin.login-admin');
    }
}
