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
            $product->setProductId($item['product_id']);
        }
        return $arr;
    }

    public function getValueProduct($id)
    {
        $sql="SELECT * FROM products WHERE product_id='$id'";
        $stmt=$this->conn->prepare($sql);
        $stmt->execute();
        $result=$stmt->fetchAll();
        return new Product($result[0]['name'],$result[0]['price'],$result[0]['quantity'],$result[0]['description'],$result[0]['img'],$result[0]['category']);

    }
}