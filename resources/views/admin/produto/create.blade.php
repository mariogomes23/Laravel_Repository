@extends('adminlte::page')

@section('title', 'Adicionar produtos')

@section('content_header')
    <h1>Adicionar Produto</h1>

@stop

@section('content')
   <div class="content row">
    <div class="box box-primary">
        <div class=" box-body">
            <form action="{{ route("produto.store")}}" method="POST">
                @csrf
                @method("POST")

                <div class="form-group">
                    <input type="text" name="nome" value="{{old("nome")}}" class="form-control" placeholder="Nome do produto" >


                   @error("nome")
                   <p class="alert alert-danger mt-2">{{ $message}}</p>

                   @enderror
                </div>
                <div class="form-group">
                    <input type="number" name="preco" value="{{old("preco")}}" class="form-control" placeholder="Preço do produto" >


                   @error("preco")
                   <p class="alert alert-danger mt-2">{{ $message}}</p>

                   @enderror
                </div>
                <div class="form-group">
                    <input type="text" name="slug"  value="{{old("slug")}}" class="form-control" placeholder="Slug do Produto" >


                    @error("slug")
                    <p class="alert alert-danger mt-2">{{ $message}}</p>

                    @enderror

                </div>
                <div class="form-group">
                   <textarea name="descricao" cols="5"  class="form-control" rows="5">

                    {{old("descricao")}}
                   </textarea>


                   @error("descricao")
                   <p class="alert alert-danger mt-2">{{ $message}}</p>

                   @enderror


                </div>

                <div class="form-group">
                 <select name="categoria_id" class="form-control">
                    @foreach ( $categorias as $cat )
                    <option value="{{ $cat->id}}">{{$cat->titulo}}</option>

                    @endforeach
                 </select>


                   @error("nome")
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

