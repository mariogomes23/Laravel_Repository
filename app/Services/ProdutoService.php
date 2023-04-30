<?php

namespace App\Services;

use App\Repositories\IProdutoRepository;

class ProdutoService{

    private $repository;

    public function __construct(IProdutoRepository $repository)
    {
         $this->repository = $repository;
    }

    public function all(){
        return $this->repository->all();

    }
    public function find(int $id){
     return $this->repository->find($id);

    }
    public function findWhere(string $coluna,string $valor){
        return $this->repository->findWhere($coluna,$valor);


    }
    public function findWhereFirst(string $coluna,string $valor){
        return $this->repository->findWhereFirst($coluna,$valor);

    }
    public function paginate(int $totalPaginas = 10){
        return $this->repository->paginate($totalPaginas);

    }
    public function store(array $dados){
        return $this->repository->store($dados);

    }
    public function update(int $id,array $dados){
        return $this->repository->update($id,$dados);

    }
    public function delete(int $id){
        return $this->repository->delete($id);
    }
    public function search($coluna,$valor){
        return $this->repository->search($coluna,$valor);
    }
}
