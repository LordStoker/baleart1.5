<?php

namespace App\Http\Requests\Backoffice;

use Illuminate\Foundation\Http\FormRequest;

class GuardarCommentRequest extends FormRequest
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
            'comment' => ['required', 'string', 'max:2000', 'min:10']
        ];
    }

    public function messages()
    {
        return [
            'comment.required' => 'El campo comentario es obligatorio',
            'comment.string' => 'El campo comentario debe ser un texto',
            'comment.max' => 'El campo comentario no puede superar los 2000 caracteres',
            'comment.min' => 'El campo comentario debe tener al menos 10 caracteres'
        ];
    }
}
