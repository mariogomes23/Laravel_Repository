<?php

namespace App\Http\Requests\Categoria;

use Illuminate\Foundation\Http\FormRequest;

class CategoriaUpdateRequest extends FormRequest
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
            "titulo"=>["nullable","min:3","max:60"],
            "slug"=>["nullable","min:3","max:60"],
            "descrical"=>["max:2000"],
            //
        ];
    }
}
