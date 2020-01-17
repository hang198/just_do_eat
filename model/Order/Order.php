<?php


class Order
{
    private $orderId;
    private $productId;
    private $orderAmount;
    private $createDate;
    private $totalPrice;
    private $price;
    

    public function __construct($productId, $orderAmount, $createDate, $totalPrice)
    {
        $this->productId = $productId;
        $this->orderAmount = $orderAmount;
        $this->createDate = $createDate;
        $this->totalPrice = $totalPrice;

    }

    

    /**
     * Get the value of orderId
     */ 
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * Set the value of orderId
     *
     * @return  self
     */ 
    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;

        return $this;
    }

    /**
     * Get the value of productId
     */ 
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * Set the value of productId
     *
     * @return  self
     */ 
    public function setProductId($productId)
    {
        $this->productId = $productId;

        return $this;
    }

    /**
     * Get the value of orderAmount
     */ 
    public function getOrderAmount()
    {
        return $this->orderAmount;
    }

    /**
     * Set the value of orderAmount
     *
     * @return  self
     */ 
    public function setOrderAmount($orderAmount)
    {
        $this->orderAmount = $orderAmount;

        return $this;
    }


    /**
     * Get the value of createDate
     */ 
    public function getCreateDate()
    {
        return $this->createDate;
    }

    /**
     * Set the value of createDate
     *
     * @return  self
     */ 
    public function setCreateDate($createDate)
    {
        $this->createDate = $createDate;

        return $this;
    }

    /**
     * Get the value of totalPrice
     */ 
    public function getTotalPrice()
    {
        return $this->totalPrice;
    }

    /**
     * Set the value of totalPrice
     *
     * @return  self
     */ 
    public function setTotalPrice($totalPrice)
    {
        $this->totalPrice = $totalPrice;

        return $this;
    }

    /**
     * Get the value of price
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */ 
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }
}