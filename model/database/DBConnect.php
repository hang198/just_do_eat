<?php

namespace DBConnect;

use PDO;

class DBConnect
{
    private $dsn;
    private $username;
    private $password;

    public function __construct()
    {
        $this->dsn = "mysql:host=localhost;dbname=just_do_eat;charset=utf8";
<<<<<<< HEAD
        $this->username = "baoquan ";
        $this->password = "zZ0611@@@";
=======
        $this->username = "quang";
        $this->password = "@Quang1997";
>>>>>>> c7760dab26e0d9187945e76ea6cf6351a152a3d5
    }

    public function connect()
    {
        $conn = null;
        try {
            $conn = new PDO($this->dsn, $this->username, $this->password);
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
        return $conn;
    }
}

?>