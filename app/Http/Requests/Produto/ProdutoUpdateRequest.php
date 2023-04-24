<?php

namespace App\Http\Requests\Produto;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoUpdateRequest extends FormRequest
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
            "nome"=>["nullable","min:3","max:100"],
            "preco"=>["nullable"],
            "slug"=>["nullable","min:3","max:100"],
            "categoria_id"=>["required","exists:categorias,id"],
            "descricao"=>["max:100"]
            //
        ];
    }
}
