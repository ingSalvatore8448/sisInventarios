<?php

namespace Inventario\Http\Controllers;

use Illuminate\Http\Request;
use Inventario\User;
use Inventario\Mobiliarios;
use Inventario\Departamentos;
use Inventario\Categoria;
class HomController extends Controller
{

    public  function index(){
        $user=User::count();
        $mobi=Mobiliarios::count();
        $depar=Departamentos::count();
        $cate=Categoria::count();
        return view('Tablero.tableros',['user'=>$user,'mobi'=>$mobi,'depa'=>$depar,'cate'=>$cate]);
    }
}
