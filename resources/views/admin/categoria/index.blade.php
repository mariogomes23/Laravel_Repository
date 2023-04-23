@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')
    <h1>Categorias</h1>
    <a href="{{route("categoria.create")}}" class="btn btn-primary">Adicionar</a>
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
                        </td>

                    </tr>

                    @endforeach
                   </tbody>

            </table>

        </div>

    </div>

   </div>
@stop

