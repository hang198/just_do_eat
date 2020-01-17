<?php


class OrderDB
{
    private $conn;

    public function __construct()
    {
        $db = new DBConnect();
        $this->conn = $db->connect();
    }

    public function createOrder($order)
    {

        $sql = "INSERT INTO `orders` (`order_id`, `product_id`, `order_amount`, `createDate`, `total_price`) 
        VALUES (NULL, :product_id, :order_amount, :createDate, :total_price)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':product_id', $order->getProductId());
        $stmt->bindParam(':order_amount', $order->getOrderAmount());
        $stmt->bindParam(':createDate', $order->getCreateDate());
        $stmt->bindParam(':total_price', $order->getTotalPrice());
        $stmt->execute();
    }

    public function getOrderById($productId)
    {

        $sql = "SELECT o.product_id, p.product_name, o.order_amount, o.createDate, o.total_price, p.price 
        FROM orders o 
        INNER JOIN products p
        ON o.product_id = p.product_id
        WHERE o.product_id = $productId";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
        $result = $stmt->fetch();
        $order = new Order($result['product_name'], $result['order_amount'], $result['createDate'], $result['total_price']);
        $order->setPrice($result['price']);
        $order->setOrderId($result['product_id']);
        return $order;
    }

    public function getProductById($product_id)
    {
        $sql = "SELECT product_name, price, product_id
        FROM products
        WHERE product_id = $product_id";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
        $result = $stmt->fetch();
        $order = new Order($result['product_name'], null, null, null, null);
        $order->setPrice($result['price']);
        $order->setOrderId($result['product_id']);
        return $order;
    }

    public function getUserById($userId)
    {
        $sql = "SELECT * FROM users
        WHERE user_id = $userId";
        $stmt = $this->conn->query($sql);
        $result = $stmt->fetchAll();
        $arr = [];
        foreach ($result as $item) {
            $user = new User($item['username'], $item['password'], $item['email'], $item['address'], $item['phone'], $item['avatar'], $item['position']);
            $user->setUserId($item['user_id']);
            array_push($arr, $user);
        }
        return $arr;

    }
}