<?php


namespace User;


use DBConnect\DBConnect;

class UserDB
{
    private $userDB;

    public function __construct()
    {
        $db = new DBConnect();
        $this->userDB = $db->connect();
    }

    public function createUser($user)
    {
        $sql = "INSERT INTO users()";
    }


}