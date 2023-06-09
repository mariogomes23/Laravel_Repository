<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

interface IProdutoRepository
{

    public function __construct(Model $model);
    public function all();
    public function find(int $id);
    public function findWhere(string $coluna,string $valor);
    public function findWhereFirst(string $coluna,string $valor);
    public function paginate(int $totalPaginas = 10);
    public function store(array $dados);
    public function update(int $id,array $dados);
    public function delete(int $id);
    public function search($coluna,$valor);






}


