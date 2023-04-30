<?php
namespace App\Repositories;

use App\Repositories\IProdutoRepository;
use Illuminate\Database\Eloquent\Model;

class  ProdutoRepository implements IProdutoRepository
{

    protected $model;

    public function __construct(Model $model) {

        $this->model = $model;
    }


      //====================================================
    public function all(){

        return $this->model->all();
    }
    //====================================================
    public function find(int $id){
        return $this->model->findOrFail($id);

    }
      //====================================================
    public function findWhere(string $coluna,string $valor){

        return $this->model->where($coluna,$valor)->get();
    }
      //====================================================
    public function findWhereFirst($coluna,$valor){

        return $this->model->where($coluna,$valor)->first();
    }
      //====================================================
    public function paginate($totalPaginas = 10){
        return $this->model->paginate($totalPaginas);

    }
      //====================================================
    public function store(array $dados){

        return $this->model->create($dados);

    }
      //====================================================
    public function update(int $id,array $dados){
        return $this->model->findOrFail($id)->update($dados);

    }
      //====================================================
    public function delete(int $id){

        return $this->model->findOrFail($id)->delete();
    }
      //====================================================
      public function search(){

        
      }
      //====================================================

}
