<?php

namespace App\Http\Requests\BackOffice;

use Illuminate\Foundation\Http\FormRequest;

class GuardarService extends FormRequest
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
            'nombre' => ['required', 'string','min:5', 'max:255'],
            'descripcion_ca' => 'required|string|min:5|max:255',
            'descripcion_es' => 'required|string|min:5|max:255',
            'descripcion_en' => 'required|string|min:5|max:255',
        ];
    }

    public function messages(){

        return[
        'nombre.required' => 'El campo nombre es obligatorio',
        'nombre.string' => 'El campo nombre debe ser un texto',
        'nombre.max' => 'El campo nombre no puede tener más de 100 caracteres',
        'nombre.min' => 'El campo nombre debe tener al menos 5 caracteres',
        'descripcion_ca.required' => 'El campo descripción catalán es obligatorio',
        'descripcion_ca.string' => 'El campo descripción catalán debe ser un texto',
        'descripcion_ca.min' => 'El campo descripción catalán debe tener al menos 5 caracteres',
        'descripcion_ca.max' => 'El campo descripción catalán no puede tener más de 255 caracteres',
        'descripcion_es.required' => 'El campo descripción español es obligatorio',
        'descripcion_es.string' => 'El campo descripción español debe ser un texto',
        'descripcion_es.min' => 'El campo descripción español debe tener al menos 5 caracteres',
        'descripcion_es.max' => 'El campo descripción español no puede tener más de 255 caracteres',
        'descripcion_en.required' => 'El campo descripción inglés es obligatorio',
        'descripcion_en.string' => 'El campo descripción inglés debe ser un texto',
        'descripcion_en.min' => 'El campo descripción inglés debe tener al menos 5 caracteres',
        'descripcion_en.max' => 'El campo descripción inglés no puede tener más de 255 caracteres',
        ];

    }
}
