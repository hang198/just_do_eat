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

    public function infoUser()
    {
        $user_id = $_GET['id'];
        $userById = $this->userDB->getUserById($user_id);
        include_once 'info_user.php';
    }

    public function addUser()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            include_once "form_register.php";
        } else {
            $user = new User($_POST['username'], $_POST['password'], $_POST['email'], $_POST['address'], $_POST['phone'], $_FILES['avatar'][name], 'Member');
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
                    $_SESSION["admin"] = $user->getPosition();
                    $_SESSION["idUser"] = $user->getUserId();
                    $_SESSION["Avatar"] = $user->getAvatar();
                    header("Location: ../../index.php");
                }
            }
        }

    }

    public function logout()
    {
        session_destroy();
        header("Location: ../../index.php");
    }

    public function editUser()
    {
        $user_id = $_GET['id'];
        $userById = $this->userDB->getUserById($user_id);

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            include_once "edit_user.php";
        } else {
            $user = new User(null, null, $_POST['email'], $_POST['address'], $_POST['phone'], $_POST['avatar'], null);
            $this->userDB->editUser($userById, $user);
            header("Location: ../../index.php");
        }
    }

    public function editPass()
    {
        $user_id = $_GET['id'];
        $userById = $this->userDB->getUserById($user_id);

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            include_once "edit_pass.php";
        } else {
            $user = new User(null, $_POST['password'], null, null, null, null, null);
            $this->userDB->editPass($userById, $user);
            $this->logout();
            header("Location: ../../index.php");
        }
    }


}