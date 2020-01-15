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

    public function getListProduct($start, $limit)
    {
        $sql = "SELECT * FROM products LIMIT $start, $limit";
        $stmt = $this->conn->query($sql);
        $result = $stmt->fetchAll();
        return $this->createProductFromData($result);
    }

    public function createProduct($product)
    {
        $name = $product->getName();
        $price = $product->getPrice();
        $quantity = $product->getQuantity();
        $description = $product->getDescription();
        $img = $product->getImg();
        $category = $product->getCategory();

        $sql = "INSERT INTO products(product_name, price, quantity, description, img, category) 
                VALUE (:name, :price, :quantity, :description, :img, :category)";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':quantity', $quantity);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':img', $img);
        $stmt->bindParam(':category', $category);
        $stmt->execute();

    }

    public function editProduct($product_id, $product)
    {
        $name = $product->getName();
        $price = $product->getPrice();
        $quantity = $product->getQuantity();
        $description = $product->getDescription();
        $img = $product->getImg();
        $category = $product->getCategory();

        $sql = "UPDATE products 
                SET name = :product_name, price = :price, quantity = :quantity, 
                    description = :description, img = :img, category = :category
                WHERE product_id = :product_id";
        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':quantity', $quantity);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':img', $img);
        $stmt->bindParam(':category', $category);

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
            $product = new Product($item['product_name'], $item['price'], $item['quantity'], $item['description'], $item['img'], $item['category']);
            $product->setProductId($item['product_id']);
            array_push($arr, $product);
        }
        return $arr;
    }

    public function getValueProduct($id)
    {
        $sql = "SELECT * FROM products WHERE product_id='$id'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return new Product($result[0]['product_name'], $result[0]['price'], $result[0]['quantity'], $result[0]['description'], $result[0]['img'], $result[0]['category']);


    }

    public function upload()
    {
        $file_name = $_FILES['img']['name'];
        $file_tmp = $_FILES['img']['tmp_name'];
        $file_type = $_FILES['img']['type'];
        $file_ext = strtolower(end(explode('/', $file_type)));
        $ext = ["jpg", "png", "jpeg"];
        if (in_array($file_ext, $ext)) {
            move_uploaded_file($file_tmp, "images/" . date("H:i:s") . $file_name);
        }
    }

    public function searchProduct($keyword)
    {
        $sql = "SELECT * FROM products p
        INNER JOIN categories c
        ON p.category = c.category_id
        WHERE p.product_name LIKE '%$keyword%' OR c.category_name LIKE '%$keyword%'";
        $stmt = $this->conn->query($sql);
        $result = $stmt->fetchAll();
        return $this->createProductFromData($result);
    }

    public function sortBy($sortBy)
    {
        $sql = "SELECT * FROM products ORDER BY price $sortBy";
        $stmt = $this->conn->query($sql);
        $result = $stmt->fetchAll();
        return $this->createProductFromData($result);
    }

    public function totalRecordsPage()
    {
        $sql = "SELECT COUNT(product_id) as total FROM `products`";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll();
    }

}