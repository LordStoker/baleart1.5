<?php

namespace App\Http\Requests\Backoffice;

use App\Rules\Uppercase;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSpaceRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:5', 'max:100',],
            'regNumber' => ['required', 'string', 'min:4', 'max:10'],
            'observation_CA' => 'required|string|min:5|max:3000',
            'observation_ES' => 'required|string|min:5|max:3000',
            'observation_EN' => 'required|string|min:5|max:3000',
            'email' => ['required', 'email', Rule::unique('spaces')->ignore($this->route('space'))],
            'phone' => 'required|string|min:5|max:10',
            'website' => 'required|string|min:5|max:255',
            'accessType' => 'required|in:y,n,p',
        ];
    }

    
    public function messages()
    {
        return [
            'name.required' => 'El campo name es obligatorio',
            'name.string' => 'El campo name debe ser un texto',
            'name.max' => 'El campo name no puede tener más de 100 caracteres',
            'name.min' => 'El campo name debe tener al menos 5 caracteres',
            'regNumber.required' => 'El campo registro es obligatorio',
            'regNumber.unique' => 'El campo registro ya está en uso',
            'regNumber.min' => 'El campo registro debe tener al menos 4 caracteres',
            'regNumber.max' => 'El campo registro no puede tener más de 10 caracteres',
            'observation_CA.required' => 'El campo descripción catalán es obligatorio',
            'observation_CA.string' => 'El campo descripción catalán debe ser un texto',
            'observation_CA.min' => 'El campo descripción catalán debe tener al menos 5 caracteres',
            'observation_CA.max' => 'El campo descripción catalán no puede tener más de 3000 caracteres',
            'observation_ES.required' => 'El campo descripción español es obligatorio',
            'observation_ES.string' => 'El campo descripción español debe ser un texto',
            'observation_ES.min' => 'El campo descripción español debe tener al menos 5 caracteres',
            'observation_ES.max' => 'El campo descripción español no puede tener más de 3000 caracteres',
            'observation_EN.required' => 'El campo descripción inglés es obligatorio',
            'observation_EN.string' => 'El campo descripción inglés debe ser un texto',
            'observation_EN.min' => 'El campo descripción inglés debe tener al menos 5 caracteres',
            'observation_EN.max' => 'El campo descripción inglés no puede tener más de 3000 caracteres',
            'email.required' => 'El campo email es obligatorio',
            'email.unique' => 'El campo email ya está en uso',
            'email.email' => 'El campo email debe ser un email válido',            
            'phone.required' => 'El campo teléfono es obligatorio',
            'phone.string' => 'El campo teléfono debe ser un texto',
            'phone.min' => 'El campo teléfono debe tener al menos 5 caracteres',
            'phone.max' => 'El campo teléfono no puede tener más de 10 caracteres',
            'website.required' => 'El campo web es obligatorio',
            'website.string' => 'El campo web debe ser un texto',
            'website.min' => 'El campo web debe tener al menos 5 caracteres',
            'website.max' => 'El campo web no puede tener más de 255 caracteres',
            'accessType.required' => 'El campo tipo de acceso es obligatorio',
            'accessType.in' => 'El campo tipo de acceso debe ser y, n o p',
            'address.required' => 'El campo dirección es obligatorio',


        ];
    }
}
