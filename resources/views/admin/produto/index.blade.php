@extends('adminlte::page')

@section('title', 'Produtos')

@section('content_header')
    <h1>Produtos</h1>
    <a href="{{route("produto.create")}}" class="btn btn-primary">Adicionar</a>

    <div class="content mt-2 row">
        <div class="box box-primary">
            <div class=" box-body">
                <form action="{{ route("produto.search")}}" style="display: inline;" method="GET">
                    @csrf
                    @method("GET")
                    <input type="text" name="pesquisar" id=""  class="form-control" placeholder="pesquisar">
                    <input type="submit" class="btn btn-primary mt-2" value="enviar">
                </form>

            </div>
        </div>
    </div>

@stop

@section('content')
   <div class="content col-12 row">
    <div class="box box-primary">
        <div class=" box-body">

            @if (Session::has("message"))
            <p class="alert alert-success">{{ Session::get("message")}}</p>

            @endif
            <table class="table table-striped">
                   <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th  scope="col">Nome</th>
                        <th  scope="col">Preço</th>
                        <th  scope="col">Slug</th>
                        <th  scope="col">Categoria</th>
                        <th  scope="col">Descrição</th>
                        <th  scope="col">Opção</th>
                    </tr>
                   </thead>

                   <tbody>

                    @foreach ($produtos as $produto )
                        <tr>

                        <td scope="row"> {{$produto->id}}</td>
                        <td scope="row">{{$produto->nome}}</td>
                        <td scope="row">{{$produto->preco}}</td>
                        <td scope="row">{{$produto->slug}}</td>
                        <td scope="row">{{$produto->categoria->titulo}}</td>
                        <td scope="row">{{$produto->descricao}}</td>
                        <td scope="row">
                        <a href="{{route("produto.edit",$produto->id)}}" class="badge bg-yellow">Editar</a>
                        <a href="{{route("produto.show",$produto->id)}}" class="badge bg-info">ver</a>
                        <form action="{{route("produto.destroy",$produto->id)}}" method="POST" style="display:inline;">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="badge btn bg-danger">apagar</button>

                        </form>
                        </td>

                    </tr>

                    @endforeach
                   </tbody>

            </table>

            {{ $produtos ->links()}}

        </div>

    </div>

   </div>
@stop

