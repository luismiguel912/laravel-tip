<?php
namespace App\Repositories;
use App\User;

class UserRepositories extends BaseRepository{

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
        parent::__construct($user);
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
}

