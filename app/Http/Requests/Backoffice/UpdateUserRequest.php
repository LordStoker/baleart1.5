<?php

namespace App\Http\Requests\Backoffice;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:5', 'max:100'],
            'last_name' => 'required|string|min:2|max:100',
            'email' => ['required', 'email', Rule::unique('users')->ignore($this->route('user'))],
            'phone' => 'required|string|min:6|max:20',
            'password' => 'required|string|min:4|max:35',
        ];
    }

    public function messages(){
        return [
        'name.required' => 'El campo nombre es obligatorio',
        'name.string' => 'El campo nombre debe ser un texto',
        'name.max' => 'El campo nombre no puede tener más de 100 caracteres',
        'name.min' => 'El campo nombre debe tener al menos 5 caracteres',
        'last_name.required' => 'El campo apellido es obligatorio',
        'last_name.string' => 'El campo apellido debe ser un texto',
        'last_name.max' => 'El campo apellido no puede tener más de 100 caracteres',
        'last_name.min' => 'El campo apellido debe tener al menos 2 caracteres',
        'email.required' => 'El campo email es obligatorio',
        'email.email' => 'El campo email debe ser un email',
        'email.unique' => 'El campo email ya está en uso',
        'password.required' => 'El campo contraseña es obligatorio',
        'password.string' => 'El campo contraseña debe ser un texto',
        'password.max' => 'El campo contraseña no puede tener más de 9 caracteres',
        'password.min' => 'El campo contraseña debe tener al menos 4 caracteres',
        'phone.required' => 'El campo teléfono es obligatorio',
        'phone.min' => 'El campo teléfono debe tener al menos 6 caracteres',
        'phone.max' => 'El campo teléfono no puede tener más de 20 caracteres',
        ];
    }
}
