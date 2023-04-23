<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Categoria\CategoriaCreateRequest;
use App\Http\Requests\Categoria\CategoriaUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categorias = DB::table("categorias")->get();

        return  View("admin.categoria.index",compact("categorias"));



    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categorias = DB::table("categorias")->get();

        return View("admin.categoria.create",compact("categorias"));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoriaCreateRequest $request)
    {
        DB::table("categorias")->insert([

            "titulo"=>$request->titulo,
            "slug"=>$request->slug,
            "descricao"=>$request->descricao,
        ]);
        //
        return redirect()->route("categoria.index")->with("message","Categoria adicionada com sucesso");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $categorias = DB::table("categorias")->where("id",$id)->first();

        return View("admin.categoria.edit",compact("categorias"));

        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoriaUpdateRequest $request, string $id)
    {
        //
        DB::table('categorias')->where("id",$id)->update([

            "titulo"=>$request->titulo,
            "slug"=>$request->slug,
            "descricao"=>$request->descricao,


        ]);

        return redirect()->route("categoria.index")->with("message","Categoria atualizada com sucesso");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
