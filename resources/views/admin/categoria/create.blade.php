@extends('adminlte::page')

@section('title', 'Adicionar Categorias')

@section('content_header')
    <h1>Adicionar Categoria</h1>

@stop

@section('content')
   <div class="content row">
    <div class="box box-primary">
        <div class=" box-body">
            <form action="{{ route("categoria.store")}}" method="POST">
                @csrf
                @method("POST")

                <div class="form-group">
                    <input type="text" name="titulo" value="{{old("titulo")}}" class="form-control" placeholder="titulo da categoria" >


                   @error("titulo")
                   <p class="alert alert-danger mt-2">{{ $message}}</p>

                   @enderror
                </div>
                <div class="form-group">
                    <input type="text" name="slug"  value="{{old("slug")}}" class="form-control" placeholder="Slug da categoria" >


                    @error("slug")
                    <p class="alert alert-danger mt-2">{{ $message}}</p>

                    @enderror

                </div>
                <div class="form-group">
                   <textarea name="descricao" cols="5" value="{{old("descricao")}}" class="form-control" rows="5"></textarea>


                   @error("descricao")
                   <p class="alert alert-danger mt-2">{{ $message}}</p>

                   @enderror


                </div>

                <div class="form-group">
                    <input type="submit"  class="btn btn-primary" value="enviar" >



                </div>
            </form>


        </div>

    </div>

   </div>
@stop

