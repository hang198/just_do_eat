<?php


namespace Order;


use DBConnect\DBConnect;

class OrderDB
{
    private $conn;

    public function __construct()
    {
        $db = new DBConnect();
        $this->conn = $db->connect();
    }
}