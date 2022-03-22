<?php
namespace App\Repositories;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Http\Resources\UserResource;

class UserRepository implements UserRepositoryInterface{

    public function getAll(){
        return User::all();
    }

    public function getUser($id){
        return new UserResource(User::findOrFail($id));
    }

}
