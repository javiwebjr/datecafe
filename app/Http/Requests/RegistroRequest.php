<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegistroRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => [
                'required',
                'confirmed',
                Password::min(8)->letters()->symbols()->numbers()
            ],
            'direccion' => ['required', 'string'],
            'telefono' => ['required', 'string']
        ];
    }
    public function messages()
    {
        return [
            'name' => 'El Nombre Es Obligatorio',
            'email.required' => 'El Email Es Obligatorio',
            'email.email' => 'El Email no es valido',
            'email.unique' => 'Este email ya esta registrado',
            'password' => 'El password debe contener almenos 8 caracteres, un simbolo y un numero',
            'direccion' => 'La Direccion Es Obligatoria',
            'telefono' => 'El Telefono Es Obligatorio'
        ];
    }
}
