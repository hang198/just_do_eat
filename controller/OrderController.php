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
        $arr = [];
        $totalPrice = 0;
        for ($i = 0; $i < count($_SESSION['product_id']); $i++) {
            $product = $this->orderDB->getProductById($_SESSION['product_id'][$i]);
            $product->setOrderAmount($_SESSION["quantity"][$i]);
            $createDate = date("Y-m-d");
            $totalPrice += $product->getOrderAmount() * $product->getPrice();
            array_push($arr, $product);
        }
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
        for ($i = 0; $i < count($_SESSION['product_id']); $i++) {
            $productId = $_SESSION['product_id'][$i];
            $product = $this->orderDB->getProductById($productId);

            $product->setOrderAmount($_SESSION['quantity'][$i]);

            $quantity = $product->getOrderAmount();

            $createDate = date("Y-m-d");
            $totalPrice = $product->getOrderAmount() * $product->getPrice();

            $order = new Order($productId, $quantity, $createDate, $totalPrice);
            $this->orderDB->createOrder($order);
        }
        echo "<script>alert('bạn đã thanh toán thành công!')
            window.location='../../index.php';
            </script>";
        unset($_SESSION['quantity']);
    }
}

?>