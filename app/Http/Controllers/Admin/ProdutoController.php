<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Produto\ProdutoCreateRequest;
use App\Http\Requests\Produto\ProdutoUpdateRequest;
use App\Models\Categoria;
use App\repositories\IProdutoRepository;
use Illuminate\Http\Request;


class ProdutoController extends Controller
{

    private $repository;

    public function __construct(IProdutoRepository $repository)
    {
        $this->repository = $repository ;

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $produtos = $this->repository->paginate(5);

        return View("admin.produto.index",compact("produtos"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categorias = Categoria::all();
        $produtos = $this->repository->all();


        return View("admin.produto.create",compact("produtos","categorias"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProdutoCreateRequest $request)
    {
        /*$categorias = Categoria::findOrFail($request->categoria_id);

        //
       $produtos =$categorias->produtos()->create([

            "nome"=>$request->nome,
            "slug"=>$request->slug,
            "preco"=>$request->preco,
            "descricao"=>$request->descricao,
            "categoria_id"=>$request->categoria_id,

        ]);
        */
        $this->repository->create($request->all());


        return redirect()->route("produto.index")->with("message","Produto adicionado com successo");
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        //
              //
              $categorias = Categoria::all();
              $produtos = $this->repository->findOrFail($id);

              return View("admin.produto.show",compact("produtos","categorias"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        //
        $categorias = Categoria::all();
        $produtos = $this->repository->findOrFail($id);
        return View("admin.produto.edit",compact("produtos","categorias"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProdutoUpdateRequest $request, int $id)
    {
        $produtos = $this->repository->findOrFail($id);
        $produtos->update($request->all());

        return redirect()->route("produto.index")->with("message","Produto atualizado com successo");
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $produtos = $this->repository->findOrFail($id);
        $produtos->delete();

        return redirect()->route("produto.index")->with("message","Produto apagado com successo");
        //
    }

    public function search(Request $request)
    {

        $produtos = $this->repository
        ->where("nome",$request->pesquisar)
        ->Orwhere("slug","LIKE","%{$request->pesquisar}%")
        ->paginate(2);

        return View("admin.produto.index",compact("produtos"));


    }
}
