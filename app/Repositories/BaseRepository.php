<?php
namespace App\Repositories;
use Illuminate\Database\Eloquent\Model;
use App\User;

class BaseRepository{
    protected $model;
    protected $relations;
    /*
    * * __construct
    ** se inicializa el modelo User en el contructor para tenerlo de forma global
    */
    public function __construct(Model $model, array $relations = []){
        $this->model = $model;
        $this->relations = $relations;
    }

    /*
    * * all
    ** Funcion que retorna todos los usuarios en base de datos
    */
    public function all(){
        $query =  $this->model;
        if(!empty($this->relations)){
            $query = $query->with($this->relations);
        }
        $model = $query->get();
        return response()->json($model);
    }

    /*
    * * show
    ** Funcion que retorna el usuario por su $id
    */
    public function show($id){
        $model = $this->model->find($id);
        return response()->json($model);
    }

    /*
    * * update
    ** Funcion que retorna el usuario por su $id
    */
    public function update(model $model){
        $model->save();
        return response()->json($model);
    }

    /*
    * * save
    ** Funcion crea un nuevo usuario
    */
    public function save(model $model){
        $model->save();
        return response()->json($model);
    }

}
