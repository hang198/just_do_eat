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
        $sql = "INSERT INTO orders(product_id,order_amount,customer_id,status,createDate,total_price)
                VALUE (:pr_id, :ord_amount, :cus_id, :status, :createDate, :totalPrice)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':pr_id', $order->getProduct());
        $stmt->bindParam(':ord_amount', $order->getQuantity());
        $stmt->bindParam(':cus_id', $order->getCustomer());
        $stmt->bindParam(':status', $order->getStatus());
        $stmt->bindParam(':createDate', $order->getCreateDate());
        $stmt->bindParam(':totalPrice', $order->getTotalPrice());
        $stmt->execute();
    }

    public function getListOrder()
    {
        $sql = "SELECT * FROM orders o
                INNER JOIN products pr ON o.product_id = pr.product_id
                INNER JOIN customers c ON o.customer_id = c.customer_id";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $arr = [];
        foreach ($result as $item) {
            $order = new Order($item['product_name'], $item['order_amount'], $item['customer_name'], $item['status'], $item['total_price']);
            $order->setCreateDate($item['createDate']);
            $order->setOderId($item['order_id']);
            array_push($arr, $order);
        }
        return $arr;
    }

    public function deleteOrder($order_id)
    {
        $sql = "DELETE FROM orders WHERE order_id = $order_id";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
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