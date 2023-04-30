<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Categoria\CategoriaCreateRequest;
use App\Http\Requests\Categoria\CategoriaUpdateRequest;
use App\Models\Categoria;
use App\Services\CategoriaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriaController extends Controller
{
    private $service;

    public function __construct(CategoriaService $service)
    {
        $this->service = $service;

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categorias = $this->service->paginate(2);


        return  View("admin.categoria.index",compact("categorias"));



    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categorias = $this->service->all();

        return View("admin.categoria.create",compact("categorias"));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoriaCreateRequest $request)
    {
        $this->service->store([
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
    public function show(int $id)
    {
        $categorias = $this->service->find($id);


        return View("admin.categoria.show",compact("categorias"));
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {

        $categorias = $this->service->find($id);

        return View("admin.categoria.edit",compact("categorias"));

        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoriaUpdateRequest $request, string $id)
    {
        //
    $this->service->update($id,[

            "titulo"=>$request->titulo,
            "slug"=>$request->slug,
            "descricao"=>$request->descricao,
        ]);


        return redirect()->route("categoria.index")->with("message","Categoria atualizada com sucesso");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        //

        $this->service->delete($id);

        return redirect()->route("categoria.index")->with("message","Categoria apagada com sucesso");
    }



    public function search(Request $request)
    {
        $categorias = Categoria::
                            where("titulo",$request->titulo)
                            ->orWhere("slug",$request->slug)
                            ->orWhere("descricao","LIKE","%{$request->pesquisar}%")
                            ->paginate(2);


      return View("admin.categoria.index",compact("categorias"));
    }
}
