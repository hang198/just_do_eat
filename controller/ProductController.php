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
        $this->addCart();
        if (isset($_POST['sortBy'])) {
            $sortBy = $_POST['sortBy'];
            $products = $this->productDB->sortBy($sortBy);
        } elseif (isset($_GET['keyword'])) {
            $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : null;
            $products = $this->productDB->searchProduct($keyword);
            if ($products == null) {
                echo "không có sản phẩm";
            }
        } elseif (isset($_GET['category_id'])) {
            $products = $this->productDB->searchProductByCategoryId($_GET['category_id']);
        } else {
            $products = $this->productDB->getListProduct($start, $limit);
        }
        include_once "view/product/listProduct.php";
        include_once 'view/product/pagination.php';
    }

    public function addCart()
    {
        $product_id = $_GET['id'];
        if (isset($product_id)) {
            if (isset($_COOKIE['product_id'])) {
                echo '<script> alert("Sản phẩm đã có trong giỏ")</script>';
            } else {
                setcookie('product_id'.$product_id, $product_id, time() + 3000);
                setcookie('test',122,time() + 3000);
                var_dump($_COOKIE['test']);
                var_dump(1);
                echo '<script> alert("Bạn đã thêm vào hàng vào giỏ")</script>';
            }
        }
    }

    public function deleteProductCart()
    {
        $product_id = $_GET['id'];
        if ($product_id !== null) {
            setcookie('product_id' . $product_id, $product_id, time() - 3000);
            header("location: index.php?page=cart");
        }

    }

    public function getCart()
    {
        $this->deleteProductCart();
        $products = [];
        foreach ($_COOKIE as $item) {
            $product = $this->productDB->getValueProduct($item);
            array_push($products, $product);
        }
        if ($products == null) {
            echo '<script>alert("Giỏ hàng rỗng")</script>';
        } else {
            include_once "view/product/cart.php";
        }
    }

    public function getValueProduct()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $product = $this->productDB->getValueProduct($id);
        include_once "view/product/productDetail.php";
    }
}