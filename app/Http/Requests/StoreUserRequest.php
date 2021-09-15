<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name'=> 'required',
            'email'=> 'required',
            'password'=> 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Debe ingresar un nombre de usuario',
            'email.required'=>'Debe ingresar el correo electronico del usuario',
            'password.required'=>'Debe ingresar la contraseña para el usuario'
        ];
    }
}
