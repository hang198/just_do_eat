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
        $sql = "INSERT INTO users(username, password, email, address, phone) 
                VALUE (:username, :password, :email, :address, :phone)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':username', $user->getUsername());
        $stmt->bindParam(':password', $user->getUser());
        $stmt->bindParam(':email', $user->getEmail());
        $stmt->bindParam(':address', $user->getAddress());
        $stmt->bindParam(':phone', $user->getPhone());
        $stmt->execute();
    }

    public function getListUser()
    {
        $sql = "SELECT * FROM users";
        $stmt = $this->conn->query($sql);
        $result = $stmt->fetchAll();
        return $this->createUserFromData($result);
    }

    public function editUser($user_id, $user)
    {
        $sql = "UPDATE users 
                SET username = :username, password = :password, 
                    email = :email, address = :address, phone = :phone 
                WHERE user_id = :user_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':username', $user->getUsername());
        $stmt->bindParam(':password', $user_id->getPassword());
        $stmt->bindParam(':email', $user->getEmail());
        $stmt->bindParam(':address', $user->getAddress());
        $stmt->bindParam(':phone', $user->getPhone());
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();

    }

    public function deleteUser($user_id)
    {
        $sql = "DELETE FROM users WHERE user_id = $user_id";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
    }


    /**
     * @param array $result
     * @return array
     */
    public function createUserFromData(array $result)
    {
        $arr = [];
        foreach ($result as $item) {
            $user = new User($item['username'], $item['password'], $item['email'], $item['address'], $item['phone']);
            $user->setUserId($item['user_id']);
            array_push($arr, $user);
        }
        return $arr;
    }


}