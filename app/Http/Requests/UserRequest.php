<?php

namespace Inventario\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

           'nombre'=>'required | max:50 ',
           'apellido_pa'=>'required | max:50 ',
           'apellido_ma'=>'required | max:50 ',
           'telefono'=>'required | max:50 ',
           'dni'=>'required | max:50 ',
           'sexo'=>'required | max:50 ',
           'Fecha_cumple'=>'required | max:50 ',
            'rol'=>'required | max:50 ',
            'departamento'=>'required | max:50 ',
             'correo'=>'required | max:50 ',


            ''


              ];
    }
}
