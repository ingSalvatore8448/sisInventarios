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

    	return  view('auth.login');
    }





    public function logeo(Request $request)

    {
if (Auth::attempt(
                [
                    'email' => $request->email,
                    'password' => $request->password,

                ]
                , $request->has('remember')
                )){
            return redirect()->intended($this->redirectPath());
        }
        else{
            $rules = [
                'email' => 'required|email',
                'password' => 'required',
            ];

            $messages = [
                'email.required' => 'El campo email es requerido',
                'email.email' => 'El formato de email es incorrecto',
                'password.required' => 'El campo password es requerido',
            ];

            $validator = Validator::make($request->all(), $rules, $messages);

            return redirect('auth/login')
            ->withErrors($validator)
            ->withInput()
            ->with('message', 'Error al iniciar sesión');
        }
    }
}
