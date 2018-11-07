<?php

namespace Inventario\Http\Controllers;

use Illuminate\Http\Request;

class DetalleMobiliario extends Controller
{


    public  function index(){
        return view('detaMobiliario.detalleMobi');
    }

}
