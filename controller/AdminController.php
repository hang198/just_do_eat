<?php

use Category\CategoryDB;
use Customer\CustomerDB;
use Order\OrderDB;
use User\UserDB;

class AdminController
{
    private $userDB;
    private $productDB;
    private $customerDB;
    private $categoryDB;
    private $orderDB;

    public function __construct()
    {
        $this->userDB = new UserDB();
        $this->productDB = new ProductDB();
        $this->customerDB = new CustomerDB();
        $this->categoryDB = new CategoryDB();
        $this->orderDB = new OrderDB();

    }

    public function addProduct()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            include_once "../product/add.php";
        } elseif ($_SERVER['REQUEST_METHOD'] == "POST") {
            $product = new Product($_POST['name'], $_POST['price'],
                                   $_POST['quantity'], $_POST['description'],
                                   $_POST['image'], $_POST['category']);
            $this->productDB->createProduct($product);
        }
    }

    public function getListProduct()
    {
        $products = $this->productDB->getListProduct(0, 10);
        include_once "product_manger.php";
    }

    public function deleteProduct()
    {
        $product_id = $_GET['product_id'];
        $this->productDB->deleteProduct($product_id);
        header("location: admin.php");
    }
}