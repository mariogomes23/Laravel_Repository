@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')
    <h1>Categorias</h1>
@stop

@section('content')
   <div class="content row">
    <div class="box box-primary">
        <div class=" box-body">
            <table class="table table-striped">
                   <thead>
                    <tr>
                        <th>#</th>
                        <th>Titulo</th>
                        <th>Slug</th>
                        <th>Descrição</th>
                    </tr>
                   </thead>

                   <tbody>
                    <tr>
                        @forelse ($categorias as $cat )
                        <td>{{$cat->id}}</td>
                        <td>{{$cat->titulo}}</td>
                        <td>{{$cat->slug}}</td>
                        <td>{{$cat->descricao}}</td>

                        @empty
                        <p>sem categorias disponiveis</p>
                        @endforelse
                    </tr>
                   </tbody>

            </table>

        </div>

    </div>

   </div>
@stop

