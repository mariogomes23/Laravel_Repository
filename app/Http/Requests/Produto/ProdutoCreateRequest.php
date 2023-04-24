<?php

namespace App\Http\Requests\Produto;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoCreateRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [

            "nome"=>["required","min:3","max:100","unique:produtos"],
            "preco"=>["required"],
            "slug"=>["required","min:3","max:100","unique:produtos"],
            "categoria_id"=>["required","exists:categorias,id"],
            "descricao"=>["max:100"]
            //
        ];
    }
}
