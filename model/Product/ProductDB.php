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

    public function getListProduct()
    {
        $sql = "SELECT * FROM products";
        $stmt = $this->conn->query($sql);
        $result = $stmt->fetchAll();
        return $this->createProductFromData($result);
    }

    public function createProduct($product)
    {
        $sql = "INSERT INTO products(name, price, quantity, description, img, category) 
                VALUE (:name, :price, :quantity, :description, :img, :category)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':name', $product->getName());
        $stmt->bindParam(':price', $product->getPrice());
        $stmt->bindParam(':quantity', $product->getQuantity());
        $stmt->bindParam(':description', $product->getDescription());
        $stmt->bindParam(':img', $product->getImg());
        $stmt->bindParam(':category', $product->getCategory());
        $stmt->execute();

    }

    public function editProduct($product_id, $product)
    {
        $sql = "UPDATE products 
                SET name = :name, price = :price, quantity = :quantity, 
                    description = :description, img = :img, category = :category
                WHERE product_id = :product_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':name', $product->getName());
        $stmt->bindParam(':price', $product->getPrice());
        $stmt->bindParam(':quantity', $product->getQuantity());
        $stmt->bindParam(':description', $product->getDescription());
        $stmt->bindParam(':img', $product->getImg());
        $stmt->bindParam(':category', $product->getCategory());
        $stmt->bindParam(':product_id', $product_id);
        $stmt->execute();
    }

    public function deleteProduct($product_id)
    {
        $sql = "DELETE FROM products WHERE product_id = $product_id";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
    }

    /**
     * @param array $result
     * @return array
     */
    public function createProductFromData(array $result)
    {
        $arr = [];
        foreach ($result as $item) {
            $product = new Product($item['name'], $item['price'], $item['quantity'], $item['description'], $item['img'], $item['category']);
            array_push($arr, $product);
            $product->setProductId($item['id']);
        }
        return $arr;
    }
}