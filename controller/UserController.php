<?php

use User\User;
use User\UserDB;

class UserController
{
    private $userDB;

    public function __construct()
    {
        $this->userDB = new UserDB();
    }

    public function addUser()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            include_once "view/user/signUp.php";
        } else {
            $user = new User($_POST['username'], $_POST['password'], $_POST['email'], $_POST['address'], $_POST['phone'], $_POST['avatar']);
            $this->userDB->createUser($user);
        }
    }

    public function checkLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            include_once "view/user/login.php";
        } else {
            var_dump($_POST['username']);
            var_dump($_POST['password']);
            $users = $this->userDB->getListUser();
            foreach ($users as $user) {
                if ($_POST['username'] == $user->getUsername() && $_POST['password'] == $user->getPassword()) {

                }
            }
        }

    }

}