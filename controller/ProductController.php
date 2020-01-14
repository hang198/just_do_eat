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
}