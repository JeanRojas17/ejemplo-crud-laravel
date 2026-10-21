<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ProductoRequest extends FormRequest
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
            'nombre' => 'required',
            'precio' => 'required|min:0|numeric',
            'precio_venta' => 'required|min:0|numeric',
            'stock' => 'required|min:0|numeric',
            'imagen' => 'image|mimes:jpeg,png,jpg,jfif,webp,gif|max:2048',
            'id_categoria' => 'required',
        ];

        if ($this->isMethod('POST')) {
            $rules['imagen'] = 'required|image|mimes:jpeg,png,jpg,jfif,webp,gif|max:2048';
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'imagen.required' => 'La imagen es obligatoria.',
            'imagen.image' => 'El archivo debe ser una imagen.',
            'imagen.mimes' => 'La imagen debe ser de tipo jpeg, png, jpg, jfif, webp o gif.',
            'imagen.max' => 'El tamaño de la imagen no puede ser mayor a 2MB.',
            'precio.required' => 'El campo precio es obligatorio.',
            'precio.min' => 'El campo precio no puede ser negativo.',
            'precio_venta.required' => 'El campo precio de venta es obligatorio.',
            'precio_venta.min' => 'El campo precio no puede ser negativo.',
            'stock.required' => 'El campo stock es obligatorio.',
            'stock.min' => 'El campo precio no puede ser negativo.'
        ];
    }
}
