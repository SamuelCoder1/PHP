<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateFormRequest extends FormRequest
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
            'names' => 'required|string|max:255',
            'lastnames' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'address' => 'string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'names.required' => 'El nombre es obligatorio.',
            'lastnames.required' => 'El apellido es obligatorio.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico debe ser válido.',
            'address.required' => 'La direccion es obligatorio.'
        ];
    }

    public function attributes()
    {
        return [
            'names' => 'nombre',
            'lastnames' => 'apellido',
            'email' => 'correo electrónico',
            'address' => 'dirección',
        ];
    }

}
