<?php


namespace Order;


class Order
{
    private $oder_id;
    private $product;
    private $quantity;
    private $customer;
    private $status;
    private $createDate;

    public function __construct($product, $quantity, $customer, $status, $createDate)
    {
        $this->product = $product;
        $this->quantity = $quantity;
        $this->customer = $customer;
        $this->status = $status;
        $this->createDate = $createDate;
    }

    /**
     * @return mixed
     */
    public function getOderId()
    {
        return $this->oder_id;
    }

    /**
     * @return mixed
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @return mixed
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return mixed
     */
    public function getCreateDate()
    {
        return $this->createDate;
    }

    /**
     * @param mixed $oder_id
     */
    public function setOderId($oder_id)
    {
        $this->oder_id = $oder_id;
    }

    /**
     * @param mixed $product
     */
    public function setProduct($product)
    {
        $this->product = $product;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * @param mixed $customer
     */
    public function setCustomer($customer)
    {
        $this->customer = $customer;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @param mixed $createDate
     */
    public function setCreateDate($createDate)
    {
        $this->createDate = $createDate;
    }

}