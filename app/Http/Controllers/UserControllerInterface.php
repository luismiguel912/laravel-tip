<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Repositories\UserRepositoryInterface;

class UserControllerInterface extends Controller
{

    protected $repository_user;
    protected $code_status_ok=200;
    protected $code_status_error=400;

	public function __construct(UserRepositoryInterface $repository_user){
        $this->repository_user = $repository_user;
    }


    public function index(){
        $data = $this->repository_user->getAll();
        return $data;
    }

    public function show( $id ){
        $data = $this->repository_user->getUser( $id );
        if (!$data){
			return response()->json(['status' => false,'message'=>'No se encuentra el usuario con ese código.','code'=>$this->code_status_error]);
		}

        return response()->json(['status' => true, 'data' => $data, 'code' => $this->code_status_ok]);
    }
}
