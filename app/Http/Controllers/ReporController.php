<?php

namespace Inventario\Http\Controllers;

use Illuminate\Http\Request;

class ReporController extends Controller
{
    public function index(){
    	return view('Reportes.reporte');
    }
}
