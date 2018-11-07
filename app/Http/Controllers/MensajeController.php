<?php

namespace Inventario\Http\Controllers;

use Illuminate\Http\Request;

class MensajeController extends Controller
{

    public  function Mensaje(){

        return view('Return.direcciones');
    }
    public function login(){
        return view('auth.login');
    }
}
