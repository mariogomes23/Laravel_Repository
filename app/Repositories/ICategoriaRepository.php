<?php

namespace App\RepositoryInterface\contracts;

interface RepositoryInterface
{
  

    public function all();
    public function find(int $id);
    public function findWhere($coluna,$valor);
    public function findWhereFirst($coluna,$valor);
    public function paginate($totalPaginas = 10);
    public function store(array $dados);
    public function update(int $id,array $dados);
    public function delete(int $id);






}
