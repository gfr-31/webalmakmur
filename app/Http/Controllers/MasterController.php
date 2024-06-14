<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MasterController extends Controller
{
    function home() {
        return view('layouts.home.home');
    }

    function prestasi(){
        return view('layouts.home.prestasi');
    }

    function eskul(){
        return view('layouts.home.eskul');
    }

    function galery(){
        return view('layouts.home.galery');
    }

    function dataguru(){
        return view('layouts.home.data-guru');
    }

    function sapras(){
        return view('layouts.home.sapras');
    }
    function contact(){
        return view('layouts.home.contact');
    }
}
