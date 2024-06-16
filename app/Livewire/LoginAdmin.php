<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LoginAdmin extends Component
{
    public $password;
    public $username;
    public $showPassword = false;
    protected $rules = [
        'username' => 'required',
        'password' => 'required',
    ];

    public function showPass()
    {
        $this->showPassword = !$this->showPassword;
    }
    public function login()
    {
        $this->validate();

        if (Auth::attempt([
            'name' => $this->username,
            'password' => $this->password,
        ])) {
            session()->flash('message', 'Log In Successful');
            return redirect()->intended('/panel-admin');
        } else {
            session()->flash('error', 'Your Username or Password is incorrect');
        };
        // dd($this->username);
    }
    public function navigateBack(){
        $this->emit('navigateTo', '/');
    }
    public function render()
    {
        return view('livewire.components.login-admin');
    }
}
