<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginAdminController extends Controller
{
    public function index() {
        return view('master-login');
        // return view('livewire.login-admin.login-admin');
    }

    public function logout(){
        Auth::logout();
        session()->flash('message', 'Log Out Successful');
        return redirect('/login-admin');
    }
}
