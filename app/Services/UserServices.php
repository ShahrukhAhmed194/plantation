<?php

namespace App\Services;

use App\Dao\{UserDao};

class UserServices{
    protected $user_dao;

    public function __construct()
    {
        $this->user_dao = new UserDao();
    }

    public function addNewUser($request)
    {
        return $this->user_dao->createNewUser($request);
    }
}