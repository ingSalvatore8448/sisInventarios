<?php

namespace Inventario\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MobiRes extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {       return true;
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
            'marca'=>'required | max:50',
            'serie'=>'required | max:50',
            'fecha'=>'required | max:50',
            'comentario'=>'required | max:50',
            'nombre_cate'=>'required ',
            'nombre_depar'=>'required ',
            'imagen'=>'mimes:jpeg,bmp,PNG '
        ];
    }
}
