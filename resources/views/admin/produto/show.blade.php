@extends('adminlte::page')

@section('title', 'Ver Categorias')

@section('content_header')
    <h1>Ver Categoria</h1>

@stop

@section('content')
   <div class="content row">
    <div class="box box-primary">
        <div class=" box-body">


                <div class="form-group">
                    <input type="text" disabled value="{{ $categorias->titulo}}" class="form-control" >



                </div>
                <div class="form-group">
                    <input type="text" disabled  value="{{ $categorias->slug}}"  class="form-control">




                </div>
                <div class="form-group">
                   <textarea name="descricao" disabled cols="5"  class="form-control" rows="5">

                    {{ $categorias->descricao}}
                   </textarea>




                </div>

                <div class="form-group">
          <a href="{{route("categoria.index")}}" class="btn btn-primary">Voltar</a>



                </div>


        </div>

    </div>

   </div>
@stop

