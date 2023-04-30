<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Categoria\CategoriaCreateRequest;
use App\Http\Requests\Categoria\CategoriaUpdateRequest;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriaController extends Controller
{
    private $categoria;

    public function __construct(Categoria $categoria)
    {
        $this->categoria = $categoria;

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categorias = $this->categoria->orderBy("id","desc")->paginate(2);


        return  View("admin.categoria.index",compact("categorias"));



    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categorias = $this->categoria->get();

        return View("admin.categoria.create",compact("categorias"));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoriaCreateRequest $request)
    {
        $this->categoria->create([
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
        $categorias = $this->categoria->findOrFail($id);


        return View("admin.categoria.show",compact("categorias"));
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {

        $categorias = $this->categoria->findOrFail($id);

        return View("admin.categoria.edit",compact("categorias"));

        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoriaUpdateRequest $request, string $id)
    {
        //
    $this->categoria->findOrFail($id)->update([

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

        $this->categoria->findOrFail($id)->delete();

        return redirect()->route("categoria.index")->with("message","Categoria apagada com sucesso");
    }



    public function search(Request $request)
    {
        $categorias = $this->categoria
                            ->where("titulo",$request->titulo)
                            ->orWhere("slug",$request->slug)
                            ->orWhere("descricao","LIKE","%{$request->pesquisar}%")
                            ->paginate(2);


      return View("admin.categoria.index",compact("categorias"));
    }
}
