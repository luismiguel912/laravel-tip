<?php
namespace App\Repositories;

interface UserRepositoryInterface{

    public function getAll();
    public function getUser($user_id);

}
