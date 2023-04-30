@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')
    <h1>Categorias</h1>
    <a href="{{route("categoria.create")}}" class="btn btn-primary">Adicionar</a>

    <div class="content mt-2 row">
        <div class="box box-primary">
            <div class=" box-body">
                <form action="{{ route("categoria.search")}}" style="display: inline;">
                    @csrf
                    @method("GET")
                    <input type="text" name="titulo" id=""  class="form-control" placeholder="pesquisar">
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
                        <th  scope="col">Titulo</th>
                        <th  scope="col">Slug</th>
                        <th  scope="col">Descrição</th>
                        <th  scope="col">Opção</th>
                    </tr>
                   </thead>

                   <tbody>

                    @foreach ($categorias as $cat )
                        <tr>

                        <td scope="row"> {{$cat->id}}</td>
                        <td scope="row">{{$cat->titulo}}</td>
                        <td scope="row">{{$cat->slug}}</td>
                        <td scope="row">{{$cat->descricao}}</td>
                        <td scope="row">
                        <a href="{{route("categoria.edit",$cat->id)}}" class="badge bg-yellow">Editar</a>
                        <a href="{{route("categoria.show",$cat->id)}}" class="badge bg-info">ver</a>
                        <form action="{{route("categoria.destroy",$cat->id)}}" method="POST" style="display:inline;">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="badge btn bg-danger">apagar</button>

                        </form>
                        </td>

                    </tr>

                    @endforeach
                   </tbody>

            </table>

            {{ $categorias ->links()}}

        </div>

    </div>

   </div>
@stop

