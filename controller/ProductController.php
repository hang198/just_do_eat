<?php
class ProductController
{
    public $productDB;

    public function __construct()
    {
        $this->productDB=new ProductDB();
    }

    public function index()
    {
        $products=$this->productDB->getAll();
        include_once "view/Product/listProduct.php";
    }

    public function getValueProduct()
    {
        $id=isset($_GET['id']) ? $_GET['id']:null;
        $product=$this->productDB->getValueProduct($id);
        include_once "view/Product/productDetail.php";
    }
}