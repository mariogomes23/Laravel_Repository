<?php
namespace App\Repositories;
use App\Repositories\ICategoriaRepository;
use Illuminate\Database\Eloquent\Model;

class CategoriaRepository implements ICategoriaRepository
{
    protected $model;

    public function __construct(Model $model){

        $this->model = $model;
    }
    public function all(){
      return $this->model->all();
    }
    public function find(int $id){
        return $this->model->find($id);

    }
    public function findWhere($coluna,$valor){
        return $this->model->where($coluna,$valor);

    }
    public function findWhereFirst($coluna,$valor){
        return $this->model->where($coluna,$valor)->first();

    }
    public function paginate($totalPaginas = 10){
        return $this->model->paginate($totalPaginas);
    }
    public function store(array $dados){
        return $this->model->store($dados);

    }
    public function update(int $id,array $dados){
        return $this->model->find($id)->update($dados);

    }
    public function delete(int $id){
        return $this->model->find($id)->delete();

    }

}
