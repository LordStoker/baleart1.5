<?php

namespace App\Http\Requests\Backoffice;

use App\Rules\Uppercase;
use Illuminate\Foundation\Http\FormRequest;

class GuardarSpaceRequest extends FormRequest
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
            'name' => ['required', 'string','min:5', 'max:255', new Uppercase],
            'registro'=> 'required|unique:spaces|min:4|max:10',
            'descripcion_ca' => 'required|string|min:5|max:255',
            'descripcion_es' => 'required|string|min:5|max:255',
            'descripcion_en' => 'required|string|min:5|max:255',
            'email' => 'required|unique:spaces|email',
            'phone' => 'required|string|min:5|max:10',
            'website' => 'required|string|min:5|max:255',
            'accesstype' => 'required|in:y,n,p',
        ];
    }

    
    public function messages()
    {
        return [
            'name.required' => 'El campo nombre es obligatorio',
            'name.string' => 'El campo nombre debe ser un texto',
            'name.max' => 'El campo nombre no puede tener más de 100 caracteres',
            'name.min' => 'El campo nombre debe tener al menos 5 caracteres',
            'registro.required' => 'El campo registro es obligatorio',
            'registro.unique' => 'El campo registro ya está en uso',
            'registro.min' => 'El campo registro debe tener al menos 4 caracteres',
            'registro.max' => 'El campo registro no puede tener más de 10 caracteres',
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
            'accesstype.required' => 'El campo tipo de acceso es obligatorio',
            'accesstype.in' => 'El campo tipo de acceso debe ser y, n o p',


        ];
    }
}
