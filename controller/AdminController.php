<?php

use Category\Category;
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

    // admin quản lí các sản phẩm
    public function addProduct()
    {

        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            $categories = $this->categoryDB->getCategoriesList();
            include_once "../product/add.php";
        } elseif ($_SERVER['REQUEST_METHOD'] == "POST") {
            $product = $this->createNewProduct();
            $this->productDB->createProduct($product);
            header("location: index.php");
        }
    }

    public function editProduct()
    {
        $categories = $this->categoryDB->getCategoriesList();
        $product = $this->productDB->getValueProduct($_GET['product_id']);
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            include_once "../product/edit.php";
        } elseif ($_SERVER['REQUEST_METHOD'] == "POST") {
            if ($_FILES['img']['name']) {
                unlink("../../images/" .$product->getImg());
                $image = $this->productDB->upload();
            } else {
                $image = $product->getImg();
            }
            $product = $this->createNewProduct();
            $product->setImg($image);

            $product_id = $_GET['product_id'];
            $this->productDB->editProduct($product_id, $product);
            header("location: index.php");
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
        header("location: index.php");
    }

    /**
     * @return Product
     */
    public function createNewProduct()
    {
        $image = $this->productDB->upload();
        return new Product($_POST['name'], $_POST['price'],
            $_POST['quantity'], $_POST['description'],
            $image, $_POST['category']);
    }

    // admin quản lí các loại hàng
    public function getListCategory()
    {
        $categories = $this->categoryDB->getCategoriesList();
        include_once "category_manager.php";
    }

    public function addCategory()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            include_once "../category/add.php";
        } elseif ($_SERVER['REQUEST_METHOD'] == "POST") {
            $category = new Category($_POST['name'], $_POST['description']);
            $this->categoryDB->addCategory($category);
            header("location: ?page=categoryList");
        }
    }

    public function deleteCategory()
    {
        $category_id = $_GET['category_id'];
        $this->categoryDB->deleteCategory($category_id);
        header("location: ?page=categoryList");
    }

    public function editCategory()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            $category = $this->categoryDB->getCategoryById($_GET['category_id']);
            include_once "../category/edit.php";
        } elseif ($_SERVER['REQUEST_METHOD'] == "POST") {
            $category_id = $_GET['category_id'];
            $category = new Category($_POST['name'], $_POST['description']);
            $this->categoryDB->editCategory($category_id, $category);
            header("location: ?page=categoryList");
        }
    }

    //admin quản lí user
    public function getListUser()
    {
        $users = $this->userDB->getListUser();
        include_once "user_manager.php";
    }

    public function deleteUser()
    {
        $user_id = $_GET['user_id'];
        $this->userDB->deleteUser($user_id);
        header("location: ?page=userList");
    }

}