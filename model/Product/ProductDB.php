<?php

use DBConnect\DBConnect;

class ProductDB
{
    private $conn;

    public function __construct()
    {
        $db = new DBConnect();
        $this->conn = $db->connect();
    }

    public function searchProduct($keyword)
    {
        $sql = "SELECT * FROM products p
        INNER JOIN categories c
        ON p.category = c.category_id
        WHERE p.name LIKE '%$keyword%' OR c.name LIKE '%$keyword%'";
        $stmt = $this->conn->query($sql);
        $stmt->fetchAll();
    }
}