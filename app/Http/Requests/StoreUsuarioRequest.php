<?php

namespace App\Http\Requests;

use App\Models\Usuario;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;

class StoreUsuarioRequest extends FormRequest
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
            'nombre' => 'string|required|max:20|min:3',
            'apellido_paterno' => 'string|required|max:20|min:3',
            'apellido_materno' => 'string|required|max:20|min:3',
            'ci' => 'string|max:10|min:8|unique:personas,ci',
            'direccion' => 'string|max:254',
            'email' => 'email|max:40|unique:personas,email',
            'fecha_de_nacimiento' => 'date',
            'sexo' => '',

            'nombre_usuario' => 'string|required|max:20|min:3|unique:usuarios,nombre_usuario',
            'password' => 'string|required|max:100|min:3|confirmed',
            'id_rol' => '',
        ];
    }
}
