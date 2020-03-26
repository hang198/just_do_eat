<?php


namespace Order;


use DBConnect\DBConnect;

class OrderDB
{
    private $conn;

    public function __construct()
    {
        $db = new DBConnect();
        $this->conn = $db->connect();
    }

    public function addOrder($order)
    {
        $sql = "INSERT INTO orders(product_id,order_amount,customer_id,status,createDate)
                VALUE (:pr_id, :ord_amount, :cus_id, :status, :createDate)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':pr_id', $order->getProduct());
        $stmt->bindParam(':ord_amount', $order->getQuantity());
        $stmt->bindParam(':cus_id', $order->getCustomer());
        $stmt->bindParam(':status', $order->getStatus());
        $stmt->bindParam(':createDate', $order->getCreateDate());
        $stmt->execute();
    }

    public function getListOrder()
    {
        $sql = "SELECT * FROM orders";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $arr = [];
        foreach ($result as $item) {
            $order = new Order($item['product_id'], $item['order_amount'], $item['customer_id'], $item['status']);
            $order->setCreateDate($item['createDate']);
            $order->setOderId($item['order_id']);
            array_push($arr, $order);
        }
        return $arr;
    }

    public function getOrderById($order_id)
    {
        $sql = "SELECT * FROM orders WHERE order_id = $order_id";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
        $result = $stmt->fetch();
        $order = new Order($result['product_id'], $result['order_amount'], $result['customer_id'], $result['status']);
        $order->setCreateDate($result['createDate']);
        $order->setOderId($result['order_id']);
        return $order;
    }
}