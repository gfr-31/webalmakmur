<?php

namespace App\Livewire\LoginAdmin;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;

class LoginAdmin extends Component
{
    #[Layout('components.layouts.login')]
    #[Title('MTS Al Makmur | Login Admin')]
    public $password;
    public $username;
    public $remember = false;
    public $throttletKey;
    protected $rules = [
        'username' => 'required|string',
        'password' => 'required',
    ];

    public function login()
    {
        $credentials = $this->validate();
        $throttletKey = strtolower($this->username) . '|' . request()->ip();
        // dd($throttletKey);

        if (RateLimiter::tooManyAttempts($throttletKey, 5)) {
            $this->addError('username', __('auth.throttle', [
                'seconds' => RateLimiter::availableIn($throttletKey),
            ]));
            // dd(123);
        }
        if (
            Auth::attempt([
                'name' => $credentials['username'],
                'password' => $credentials['password'],
            ], $this->remember)
        ) {
            session()->flash('message', 'Log In Successful');
            // return redirect()->intended('/panel-admin');
            notyf()->position('y', 'top')->duration(3000)->ripple(true)->dismissible(true)->addSuccess('You logged in successfully');
            return $this->redirect('/panel-admin', navigate: true);
        } else {
            RateLimiter::hit($throttletKey);
            $this->addError('username', 'Your Username or Password is incorrect');
            $this->username = "";
            $this->password = "";
        }
        // dd($this->username);
    }
    public function render()
    {
        return view('livewire.login-admin.login-admin');
    }
}
