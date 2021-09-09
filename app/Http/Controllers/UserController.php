<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Repositories\UserRepositories;

class UserController extends Controller
{
    private $UserRepositories;

    /*
    * * UserRepositories
    ** se inyecta en el contructor para acceder de forma global
    */
    public function __construct(UserRepositories $UserRepositories){
        $this->UserRepositories = $UserRepositories;
    }

    /*
    * * index
    ** Funcion que retorna los todos los usuarios, Haciendo uso de Patron Repositories
    */
    public function index(){
        $usuarios = $this->UserRepositories->all();
        return response()->json($usuarios);
    }

    /*
    * * show
    ** Funcion que retorna el usuario por su user_id, Haciendo uso de Patron Repositories
    */
    public function show($user_id){
        $usuarios = $this->UserRepositories->show($user_id);
        return response()->json($usuarios);
    }

    /*
    * * update
    ** Funcion que retorna el usuario por su user_id, Haciendo uso de Patron Repositories
    ** User $user, Model baiding (Enlace implícito), automatico para no buscar por el user_id
    */
    public function update(Request $request, User $user){
        // fill, Compara los datos del objeto con los del request,que tienen un cambio sin ser persistidos.
        // "Fill" significa literalmente "llenar". Cuando se utiliza el método fill() en un modelo, establece los atributos del modelo a los que le pasemos como argumento en un array.
        $user->fill($request->all());
        $user = $this->UserRepositories->update($user);
        return response()->json($user);
    }

    public function getUserByName(String $name){
        $user = $this->UserRepositories->getUserByName($name);
        return response()->json($user);

    }
}
