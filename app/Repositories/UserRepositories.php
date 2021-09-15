<?php
namespace App\Repositories;
use App\User;
use Illuminate\Database\Eloquent\Model;


class UserRepositories extends BaseRepository{

    /*
    * * RELATIONS
    ** Es un arreglo de relaciones de user
    */
    const RELATIONS = [
        'rolUser'
    ];

    /*
    * * __construct
    ** se inicializa el modelo User en el contructor para tenerlo de forma global
    */
    public function __construct(User $user){
        /*
        * * parent::____construct
        * * Se hace uso de la Herencia de BaseRepository
        ** Se Hace referencia ala clase padre que es BaseRepository
        ** Con esto accedemos a todos los metodos, pasandole el modelo
        */
        // parent::__construct($user);
        parent::__construct($user,self::RELATIONS);
    }
    /*
    * * getUserByName
    ** Funcion que obtiene el usuario y su rol
    ** Esta funcion es propia del usuario por eso no esta en BaseRepository
    */
    public function getUserByName($name){
        $users = User::with([
            'rolUser'
            ])->where('name',$name)->get();
        return response()->json($users);
    }

    /*
    * * all
    ** Funcion que retorna todos los usuarios en base de datos
    // */
    // public function all(){
    //     // return self::RELATIONS;
    //     $model = $this->model->with(self::RELATIONS)->get();
    //     return response()->json($model);
    // }

    /*
    * * Save
    ** Funcion que crea un nuevo usuario
    */
    // public function save($request){
    //     $user=(new User)->fill( request()->all() );
    //     $user->save();
    //     // $model->save();
    //     return response()->json($user);
    // }
}

