<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAdministrativoRequest extends FormRequest
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
        //$admin = $this->route('administrativo');
        //echo "$admin";
        //'email' => 'required|unique:personas, email,'.$admin.'|max:40',
        return [
            'nombre' => 'string|required|max:20|min:3',
            'apellido_paterno' => 'string|required|max:20|min:3',
            'apellido_materno' => 'string|required|max:20|min:3',
            'email' => 'email|required|max:40',
            'ci' => 'max:9|min:7|nullable',
            'direccion' => 'max:240|min:3|nullable|sometimes',
            'fecha_de_nacimiento' => 'date|nullable',
            'sexo' => 'max:1|nullable',

            'profesion' => 'string|min:3|required',
        ];
    }
}
