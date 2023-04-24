<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{

    private $produto;

    public function __construct(Produto $produto)
    {
        $this->produto = $produto;

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $produtos = $this->produto->with("categoria")->paginate(5);

        return View("admin.produto.index",compact("produtos"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categorias = Categoria::all();
        $produtos = $this->produto->all();


        return View("admin.produto.create",compact("produtos","categorias"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
