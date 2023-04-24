@extends('adminlte::page')

@section('title', 'Ver Produto')

@section('content_header')
    <h1>Ver Produto</h1>

@stop

@section('content')
   <div class="content row">
    <div class="box box-primary">
        <div class=" box-body">
            <ul class="list-group">
                <li>
                 Nome :   {{ $produtos->nome}}
                </li>
                <li>
                    Slug :   {{ $produtos->slug}}
                   </li>
                   <li>
                    Preço :   {{ $produtos->preco}}
                   </li>
                   <li>
                    Categoria :   {{ $produtos->categoria->titulo}}
                   </li>
                   <li>
                    Descrição :   {{ $produtos->descricao}}
                   </li>


            </ul>

            <a href="{{ route("produto.index")}}" class="btn btn-primary">Voltar</a>



        </div>

    </div>

   </div>
@stop

