<?php
namespace App\Repositories;
use App\User;

class UserRepositories{

    private $user;
    /*
    * * __construct
    ** se inicializa el modelo User en el contructor para tenerlo de forma global
    */
    public function __construct(){
        $this->user = new User();
    }

    /*
    * * all
    ** Funcion que retorna todos los usuarios en base de datos
    */
    public function all(){
        $users = $this->user::all();
        return response()->json($users);
    }

    /*
    * * show
    ** Funcion que retorna el usuario por su $id
    */
    public function show($id){
        $users = $this->user::find($id);
        return response()->json($users);
    }

    /*
    * * update
    ** Funcion que retorna el usuario por su $id
    */
    public function update(User $user){
        $user->save();
        return response()->json($user);
    }
}
