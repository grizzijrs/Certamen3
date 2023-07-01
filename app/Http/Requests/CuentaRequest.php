<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class CuentaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'nombre' => 'required|alpha|min:2|max:20',
            'apellido' => 'required|alpha|min:2|max:20',
            'user' => 'required|min:2|max:20|unique:cuentas',
            'password' => 'required|min:6|max:100|same:password_confirmation',
        ];
    }





    public function messages():array
    {
        return [
            'nombre.required' => 'Nombre NO Ingresado!',
            'nombre.alpha' => 'Nombre solo con caracteres!',
            'nombre.min' => 'Nombre con un mínimo de 2 caracteres!',
            'nombre.max' => 'Nombre con un máximo de 30 caracteres!',
            'apellido.required' => 'Apellido NO Ingresado!',
            'apellido.alpha' => 'Apellido debe tener solo caracteres!',
            'apellido.min' => 'Apellido con un mínimo de 2 caracteres!',
            'apellido.max' => 'Apellido con un mínimo de 30 caracteres!',
            'user.required' => 'Nombre de Usuario NO Ingresado!',
            'user.min' => 'Nombre debe tener mínimo 2 caracteres!',
            'user.max' => 'Nombre debe tener máximo 30 caracteres!',
            'user.unique' =>'Usuario en Uso!',
            'password.required' => 'Contraseña NO Ingresada!',
            'password.min' => 'Contraseña con un mínimo de 6 caracteres!',
            'password.max' => 'Contraseña con un máximo de 100 caracteres!', 
            'password.same' => 'Las Contraseñas ingresadas no coinciden!',
        ]; 
    } 
}