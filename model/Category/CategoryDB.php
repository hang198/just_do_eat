<?php


namespace Category;


use DBConnect\DBConnect;

class CategoryDB
{
    private $conn;

    public function __construct()
    {
        $db = new DBConnect();
        $this->conn = $db->connect();
    }
}