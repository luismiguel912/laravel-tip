<?php
namespace App\Repositories;
use Illuminate\Database\Eloquent\Model;
use App\User;

class BaseRepository{
    protected $model;
    /*
    * * __construct
    ** se inicializa el modelo User en el contructor para tenerlo de forma global
    */
    public function __construct(Model $model){
        $this->model = $model;
    }

    /*
    * * all
    ** Funcion que retorna todos los usuarios en base de datos
    */
    public function all(){
        $model = $this->model->get();
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

}
