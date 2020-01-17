<?php


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
        $name = $category->getName();
        $description = $category->getDescription();
        $sql = "INSERT INTO categories(category_name, description) VALUE (:category_name, :description)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':category_name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->execute();
    }

    public function getCategoriesList()
    {
        $sql = "SELECT * FROM categories";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $arr = [];
        foreach ($result as $item) {
            $category = new Category($item['category_name'], $item['description']);
            $category->setCategoryId($item['category_id']);
            array_push($arr, $category);
        }
        return $arr;
    }

    public function deleteCategory($category_id)
    {
        $sql = "DELETE FROM categories WHERE category_id = $category_id";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
    }

    public function editCategory($category_id, $category)
    {
        $category_name = $category->getName();
        $category_description = $category->getDescription();
        $sql = "UPDATE categories 
                SET category_name = :category_name, description = :description
                WHERE category_id = :category_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':category_name', $category_name);
        $stmt->bindParam(':description', $category_description);
        $stmt->bindParam(':category_id', $category_id);
        $stmt->execute();
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