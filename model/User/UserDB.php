<?php


namespace User;


use DBConnect\DBConnect;

class UserDB
{
    private $conn;

    public function __construct()
    {
        $db = new DBConnect();
        $this->conn = $db->connect();
    }

    public function createUser($user)
    {
        $sql = "INSERT INTO users(username, password, email, address, phone, avatar, position) 
                VALUE (:username, :password, :email, :address, :phone, :avatar, :position)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':username', $user->getUsername());
        $stmt->bindParam(':password', $user->getPassword());
        $stmt->bindParam(':email', $user->getEmail());
        $stmt->bindParam(':address', $user->getAddress());
        $stmt->bindParam(':phone', $user->getPhone());
        $stmt->bindParam(':avatar', $user->getAvatar());
        $stmt->bindParam(':position', $user->getPosition());
        $stmt->execute();
    }

    public function getListUser()
    {
        $sql = "SELECT * FROM users";
        $stmt = $this->conn->query($sql);
        $result = $stmt->fetchAll();
        return $this->createUserFromData($result);
    }

    public function editUser($userById, $user)
    {
        $sql = "UPDATE users 
                SET email = :email, address = :address, phone = :phone, avatar = :avatar
                WHERE user_id = :user_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':email', $user->getEmail());
        $stmt->bindParam(':address', $user->getAddress());
        $stmt->bindParam(':phone', $user->getPhone());
        $stmt->bindParam(':avatar', $user->getAvatar());
        $stmt->bindParam(':user_id', $userById->getUserId());
        $stmt->execute();

    }

    public function editPass($userById, $user)
    {
        $sql = "UPDATE users 
                SET password = :password
                WHERE user_id = :user_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':password', $user->getPassword());
        $stmt->bindParam(':user_id', $userById->getUserId());
        $stmt->execute();

    }

    public function deleteUser($user_id)
    {
        $sql = "DELETE FROM users WHERE user_id = $user_id";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
    }

    public function getUserById($user_id)
    {
        $sql = "SELECT * FROM users WHERE `user_id` = $user_id";
        $stmt = $this->conn->query($sql);
        $result = $stmt->fetchAll();
        $user = new User($result[0]['username'], $result[0]['password'], $result[0]['email'], $result[0]['address'], $result[0]['phone'], $result[0]['avatar'], $result[0]['position']);
        $user->setUserId($result[0]['user_id']);
        return $user;
    }


    /**
     * @param array $result
     * @return array
     */
    public function createUserFromData(array $result)
    {
        $arr = [];
        foreach ($result as $item) {
            $user = new User($item['username'], $item['password'], $item['email'], $item['address'], $item['phone'], $item['avatar'], $item['position']);
            $user->setUserId($item['user_id']);
            array_push($arr, $user);
        }
        return $arr;
    }


}