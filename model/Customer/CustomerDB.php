<?php


namespace Customer;


use DBConnect\DBConnect;

class CustomerDB
{
    private $conn;

    public function __construct()
    {
        $db = new DBConnect();
        $this->conn = $db->connect();
    }
}