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
        $this->username = "";
        $this->password = "@Quang1997";
=======
        $this->username = "quangdong";
        $this->password = "@Dong071094";
>>>>>>> 72423cb983eb9900598d009fe7c40c97ef741b76
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