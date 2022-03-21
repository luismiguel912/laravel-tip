<?php
namespace App\Repositories;
use Illuminate\Database\Eloquent\Model;
use App\User;

interface UserRepositoryInterface{

    public function getAll();
    public function getUser( $user_id );

}
