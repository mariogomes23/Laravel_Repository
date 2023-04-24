@extends('adminlte::page')

@section('title', 'Editar Produtos')

@section('content_header')
    <h1>Editar Produtos</h1>

@stop

@section('content')
   <div class="content row">
    <div class="box box-primary">
        <div class=" box-body">
            <form action="{{ route("produto.update",$produtos->id)}}" method="POST">

                @csrf
                @method("PUT")

                <div class="form-group">
                    <input type="text" name="nome" value="{{ $produtos->nome}}" class="form-control" >


                   @error("nome")
                   <p class="alert alert-danger mt-2">{{ $message}}</p>

                   @enderror
                </div>
                <div class="form-group">
                    <input type="text" name="slug"   value="{{ $produtos->slug}}"  class="form-control">


                    @error("slug")
                    <p class="alert alert-danger mt-2">{{ $message}}</p>

                    @enderror

                </div>
                <div class="form-group">
                   <textarea name="descricao" cols="5"  class="form-control" rows="5">

                    {{ $produtos->descricao}}
                   </textarea>


                   @error("descricao")
                   <p class="alert alert-danger mt-2">{{ $message}}</p>

                   @enderror


                </div>

                <div class="form-group">
                    <input type="text" name="preco"   value="{{ $produtos->preco}}"  class="form-control">


                    @error("slug")
                    <p class="alert alert-danger mt-2">{{ $message}}</p>

                    @enderror

                </div>
                <div class="form-group">
                  <select name="categoria_id" id="" class="form-control">

                    @foreach ($categorias as $cat )
                    <option value="{{ $cat->id}}">{{$cat->titulo}}</option>

                    @endforeach
                  </select>


                    @error("slug")
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

