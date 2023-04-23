@extends('adminlte::page')

@section('title', 'Editar Categorias')

@section('content_header')
    <h1>Editar Categoria</h1>

@stop

@section('content')
   <div class="content row">
    <div class="box box-primary">
        <div class=" box-body">
            <form action="{{ route("categoria.update",$categorias->id)}}" method="POST">

                @csrf
                @method("PUT")

                <div class="form-group">
                    <input type="text" name="titulo" value="{{ $categorias->titulo}}" class="form-control" >


                   @error("titulo")
                   <p class="alert alert-danger mt-2">{{ $message}}</p>

                   @enderror
                </div>
                <div class="form-group">
                    <input type="text" name="slug"   value="{{ $categorias->slug}}"  class="form-control">


                    @error("slug")
                    <p class="alert alert-danger mt-2">{{ $message}}</p>

                    @enderror

                </div>
                <div class="form-group">
                   <textarea name="descricao" cols="5"  class="form-control" rows="5">

                    {{ $categorias->descricao}}
                   </textarea>


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

