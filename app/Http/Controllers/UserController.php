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
}
