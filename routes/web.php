<?php

use App\Http\Controllers\Admin\CategoriaController;
use App\Http\Controllers\Admin\ProdutoController;
use Illuminate\Support\Facades\Route;


Route::prefix("admin")->group(function(){
    Route::get("search",[CategoriaController::class,"search"])->name("categoria.search");
    Route::resource("categorias",CategoriaController::class,[
        "names"=>[
            "index"=>"categoria.index",
            "edit"=>"categoria.edit",
            "show"=>"categoria.show",
            "update"=>"categoria.update",
            "destroy"=>"categoria.destroy",
            "create"=>"categoria.create",
            "store"=>"categoria.store",


        ]
    ]);



    Route::get("searchProduto",[ProdutoController::class,"search"])->name("produto.search");
    Route::resource("produtos",ProdutoController::class,[
        "names"=>[
            "index"=>"produto.index",
            "edit"=>"produto.edit",
            "show"=>"produto.show",
            "update"=>"produto.update",
            "destroy"=>"produto.destroy",
            "create"=>"produto.create",
            "store"=>"produto.store",


        ]
    ]);

});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
