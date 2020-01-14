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

    public function getAll()
    {
        $sql = "SELECT * FROM products";
        $stmt = $this->conn->query($sql);
        $result = $stmt->fetchAll();
        $arr = [];
        foreach ($result as $item) {
            $product = new Product($item['name'], $item['price'], $item['quantity'], $item['description'], $item['img'], $item['category']);
            array_push($arr, $product);
            $product->setProductId($item['id']);
        }
        return $arr;
    }
}