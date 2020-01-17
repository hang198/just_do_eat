<?php



class CustomerDB
{
    private $conn;

    public function __construct()
    {
        $db = new DBConnect();
        $this->conn = $db->connect();
    }

    public function addCustomer($customer)
    {
        $sql = "INSERT INTO customers(customer_name, address, phone)
                VALUE (:customer_name, :address, :phone)";
        $stmt = $this->conn->prepare($sql) ;
        $stmt->bindParam(':customer_name', $customer->getName());
        $stmt->bindParam(':address', $customer->getAddress());
        $stmt->bindParam(':phone', $customer->getPhone());
        $stmt->execute();
    }

    public function getListCustomer()
    {
        $sql = "SELECT * FROM customers";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $arr = [];
        foreach ($result as $item){
            $customer = new Customer($item['customer_name'], $item['address'], $item['phone']);
            $customer->setCustomerId($item['customer_id']);
            array_push($arr, $customer);
        }
        return $arr;
    }

    public function getCustomerById($customer_id)
    {
        $sql = "SELECT * FROM customers WHERE customer_id = $customer_id";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
        $result = $stmt->fetch();
        $customer = new Customer($result['customer_name'], $result['address'], $result['phone']);
        $customer->setCustomerId($result['customer_id']);
        return $customer;
    }

}