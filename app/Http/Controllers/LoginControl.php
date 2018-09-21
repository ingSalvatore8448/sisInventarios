<?php

namespace Inventario\Http\Controllers;

use Illuminate\Http\Request;
use Inventario\User;
use Inventario\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Facades\Input;
use Redirect;
use Inventario\Http\Requests\PersonaRequest;
use Validator;



class LoginControl extends Controller
{
    public function login(){

    	return  view('auth.loginprueba');
    }






}
