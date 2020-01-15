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
            include_once "form_register.php";
        } else {
            $user = new User($_POST['username'], $_POST['password'], $_POST['email'], $_POST['address'], $_POST['phone'], $_POST['avatar']);
            $this->userDB->createUser($user);
            header("Location: ../../index.php");
        }
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            include_once "form_login.php";
        } else {
            $users = $this->userDB->getListUser();
            foreach ($users as $user) {
                if ($_POST['username'] == $user->getUsername() && $_POST['password'] == $user->getPassword()) {
                    header("Location: ../../index.php");
                }
            }
        }

    }

}