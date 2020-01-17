<?php

session_start();

class ProductController
{
    private $productDB;

    public function __construct()
    {
        $this->productDB = new ProductDB();
    }

    public function index()
    {
        $limit = 8;
        header("location: index.php?page=cart");
        $current_page = isset($_GET['pageNumber']) ? $_GET['pageNumber'] : 1;
        $start = ($current_page - 1) * $limit;
        $total_records = $this->productDB->totalRecordsPage();
        $total_page = ceil($total_records[0]['total'] / $limit);
        $this->addCart();
        if (isset($_POST['sortBy'])) {
            $sortBy = $_POST['sortBy'];
            $products = $this->productDB->sortBy($sortBy, $start, $limit);
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
        $product_id = $_GET['product_id'];
        if (isset($product_id)) {
            if (in_array($product_id, $_SESSION['product_id'])) {
                echo "<script>alert('sản phẩm này đã có trong giỏ hàng')</script>";
            } else {
                array_push($_SESSION['product_id'], $product_id);
            }
        }
    }

    public function deleteProductCart()
    {
        if ($product_id = $_GET['id']) {
            foreach ($_SESSION['product_id'] as $key => $id) {
                if ($id == $product_id) {
                    array_splice($_SESSION['product_id'], $key, 1);
                }
            }
        }
    }

    public function getCart()
    {
        $cart = [];
        $this->deleteProductCart();
        foreach ($_SESSION['product_id'] as $id) {
            $product = $this->productDB->getValueProduct($id);
            array_push($cart, $product);

        }
        if($_SERVER['REQUEST_METHOD']=="POST"){
            echo "<script>alert('bạn đã đặt hàng thành công')
            window.location='view/order/index.php';
            </script>";
        }
        include_once "view/product/cart.php";
    }

    public function getValueProduct()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $product = $this->productDB->getValueProduct($id);
        include_once "view/product/productDetail.php";
    }

}