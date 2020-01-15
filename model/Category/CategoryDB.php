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

    public function addCategory($category)
    {
        $sql = "INSERT INTO categories(category_name, desciption) VALUE (:category_name, :description)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':category', $category->getName());
        $stmt->bindParam(':description', $category->getDescription());
        $stmt->execute();
    }

    public function getCategoriesList()
    {
        $sql = "SELECT * FROM categories";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $arr = [];
        foreach ($result as $item){
            $category = new Category($item['category_name'], $item['description']);
            $category->setCategoryId($item['category_id']);
            array_push($arr, $category);
        }
        return $arr;
    }

    public function getCategoryById($category_id)
    {
        $sql = "SELECT * FROM categories WHERE category_id = $category_id";
        $stmt = $this->conn->query($sql);
        $result = $stmt->fetch();
        $category = new Category($result['category_name'], $result['description']);
        $category->setCategoryId($result['category_id']);
        return $category;
    }
}