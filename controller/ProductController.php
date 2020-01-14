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
        $product = new Product('chân gà rang muối', 20000, 10, "chân gà ngon", "", "1");
        $this->productDB->createProduct($product);
    }

    public function getValueProduct()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $product = $this->productDB->getValueProduct($id);
        include_once "view/Product/productDetail.php";
    }
}