<?php

class ProductController
{
    public $productDB;

    public function __construct()
    {
        $this->productDB = new ProductDB();
    }

    public function index()
    {
        $products = $this->productDB->getListProduct();
        include_once "view/Product/listProduct.php";
    }

    public function createProduct()
    {
        include_once "view/product/add.php";
        if($_SERVER['REQUEST_METHOD']=="POST"){
            $this->productDB->upload();
            $name=$_POST['name'];
            $price=$_POST['price'];
            $quantity=$_POST['quantity'];
            $description=$_POST['description'];
            $img= date('H:i:s').$_FILES['img']['name'];
            $category=$_POST['category'];
            $product = new Product($name,$price,$quantity,$description,$img,$category);
            $this->productDB->createProduct($product);
        }

    }

    public function getValueProduct()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $product = $this->productDB->getValueProduct($id);
        include_once "view/Product/productDetail.php";
    }
}