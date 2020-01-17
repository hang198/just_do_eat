<?php

class OrderController
{
    private $orderDB;
    private $userDB;

    public function __construct()
    {
        $this->orderDB = new OrderDB();
        $this->userDB = new UserDB();
    }
    public function index()
    {
        $productId = 9;
        $product = $this->orderDB->getProductById($productId);
        $createDate = date("Y-m-d");
        $quantity = 24;
        $totalPrice = $quantity * $product->getPrice();        
        
        
        $userId = $_SESSION["idUser"];
        $user = $this->orderDB->getUserById($userId);
        $productId = $product->getProductId();
        include_once "../../view/order/cart.php";
    }

    public function bill()
    {
        $productId = 7;
        $userId = $_SESSION["idUser"];
        $user = $this->orderDB->getUserById($userId);
        $cart = $this->orderDB->getOrderById($productId);
        include_once "../../view/order/bill.php";
    }

    public function addCart()
    {
        $productId = 9;
        $product = $this->orderDB->getProductById($productId);
        $quantity = 24;
        $createDate = date("Y-m-d H:i:s");
        $totalPrice = $quantity * $product->getPrice();

        $order = new Order($productId, $quantity, $createDate, $totalPrice);
        $this->orderDB->createOrder($order);
        header("location: index.php?page=bill");
    }
}

?>