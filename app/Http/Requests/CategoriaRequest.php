<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CategoriaRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'nombre' => 'required|max:255',
            'descripcion' => 'required',
            'status' => 'required|boolean'
        ];

        if ($this->isMethod('POST')) {
            $rules['nombre'] = 'required|max:255|unique:categorias,nombre';
        }

        return $rules;
    }

    public function messages():array
    {
        return [
            'nombre.required'=>'El campo nombre es obligatorio',
            'nombre.max'=>'El nombre debe tener maximo 255 caracteres',
            'nombre.unique'=>'El nombre ya existe en la base de datos',
            'descripcion.required'=>'El campo descripcion es  es obligatorio',
            'status.required'=>'El campo status es  es obligatorio'
        ];
    }
}