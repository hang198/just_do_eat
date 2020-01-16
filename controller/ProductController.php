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
        $limit = 8;
        $current_page = isset($_GET['pageNumber']) ? $_GET['pageNumber'] : 1;
        $start = ($current_page - 1) * $limit;
        $total_records = $this->productDB->totalRecordsPage();
        $total_page = ceil($total_records[0]['total'] / $limit);
        if (isset($_POST['sortBy'])) {
            $sortBy = $_POST['sortBy'];
            $products = $this->productDB->sortBy($sortBy);
        } elseif (isset($_GET['keyword'])) {
            $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : null;
            $products = $this->productDB->searchProduct($keyword);
            if ($products == null) {
                echo "không có sản phẩm";
            }
        } else {
            $products = $this->productDB->getListProduct($start, $limit);
        }
        include_once "view/product/listProduct.php";
        include_once 'view/product/pagination.php';
    }

    public function getValueProduct()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $product = $this->productDB->getValueProduct($id);
        include_once "view/product/productDetail.php";
    }
}