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
                echo "khong co san pham";
            }
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
            if(isset($_COOKIE['product_id'.$product_id])){
                echo '<script> alert("Sản phẩm đã có trong giỏ")</script>';
            }else{
            setcookie('product_id'.$product_id, $product_id, time() + 3000);
             $_COOKIE['product_id'.$product_id];
             echo '<script> alert("Bạn đã thêm vào hàng vào giỏ")</script>';
            }
        };
    }

    public function deleteProductCart()
    {
        $product_id=$_GET['id'];
        if ($product_id!==null){
            setcookie('product_id'.$product_id, $product_id, time() - 3000);
            header("location: index.php?page=cart");
        }

    }

    public function getCart()
    {
        $this->deleteProductCart();
        $products=[];
        foreach ($_COOKIE as $item){
            $product=$this->productDB->getValueProduct($item);
            $product->setProductId($item['product_id']);
            array_push($products,$product);
        }
        if(!isset($products)){
            echo '<script>alert("Giỏ hàng rỗng")</script>';
//            header("location: index.php");
        }else{
            include_once "view/product/cart.php";
        }

    }



    public function deleteProduct()
    {
        $product_id = $_GET['id'];
        if ($product_id !== null) {
            $product = $this->productDB->getValueProduct($product_id);
            $this->productDB->deleteProduct($product_id);
            unlink('images/' . $product->getImg());
        }

    }

    public function createProduct()
    {
        include_once "view/product/add.php";
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $this->productDB->upload();
            $name = $_POST['name'];
            $price = $_POST['price'];
            $quantity = $_POST['quantity'];
            $description = $_POST['description'];
            $img = date('H:i:s') . $_FILES['img']['name'];
            $category = $_POST['category'];
            $product = new Product($name, $price, $quantity, $description, $img, $category);
            $this->productDB->createProduct($product);

        }

    }

    public function editProduct()
    {
        $product_id = isset($_GET['id']) ? $_GET['id'] : null;
        $product = $this->productDB->getValueProduct($product_id);
        include_once "view/product/edit.php";
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $name = $_POST['name'];
            $price = $_POST['price'];
            $quantity = $_POST['quantity'];
            $description = $_POST['description'];
            $category = $_POST['category'];
            if ($_FILES['img']['name'] != null) {
                unlink('images/' . $product->getImg());
                $this->productDB->upload();
                $img = date('H:i:s') . $_FILES['img']['name'];
            } else {
                $img = $product->getImg();
            }
            $productNew = new Product($name, $price, $quantity, $description, $img, $category);
            $this->productDB->editProduct($product_id, $productNew);
            header('location: index.php');
        }

    }

    public function getValueProduct()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $product = $this->productDB->getValueProduct($id);
        include_once "view/product/productDetail.php";
    }
}