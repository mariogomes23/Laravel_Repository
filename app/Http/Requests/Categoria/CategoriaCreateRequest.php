<?php

namespace App\Http\Requests\Categoria;

use Illuminate\Foundation\Http\FormRequest;

class CategoriaCreateRequest extends FormRequest
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
            "titulo"=>["required","min:3","max:60","unique:categorias"],
            "slug"=>["required","min:3","max:60","unique:categorias"],
            "descrical"=>["max:2000"],
            //
        ];
    }
}
