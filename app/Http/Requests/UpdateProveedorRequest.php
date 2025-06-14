<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateProveedorRequest extends FormRequest
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
        //dd(request()); --> ver request->parameters
        return [
            'nombre' => 'string|required|max:40|min:3',
            'NIT' => 'max:10|unique:proveedores,NIT,'.request()->id.'',
            'direccion' => 'string|max:254',
            'email' => 'max:40|unique:proveedores,email, '.request()->id.'',
            'telefono' => 'max:12|unique:proveedores,telefono,'.request()->id.'',

        ];
    }
}
