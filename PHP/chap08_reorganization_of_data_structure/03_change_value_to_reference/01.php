<?php

/**
 * 値オブジェクトと参照オブジェクトを分けて考える。
 * 値オブジェクト:日付やお金のようなもので、システム中に重複するインスタンスが存在して問題ないもの。
 * 参照オブジェクト:顧客や勘定のようなもので、システム中で重複すると問題があるインスタンス。
 * 
 * 以下の例は、顧客を表すCustomerクラスを値オブジェクトとして使っている例。
 * Customerインスタンスが同じ顧客を表す場合、各Order間で同じインスタンスを指すようにリファクタリングする。
 */

function numberOfOrdersFor($customerName, array $orders)
{
    $numberOfOrder = 0;
    foreach ($orders as $order) {

        if ($order->getCustomerName() === $customerName) $numberOfOrder++;
    }
    return $numberOfOrder;
}


class Order
{
    /** @var Customer $_customer */
    protected $_customer;

    public function __construct($customerName)
    {
        $this->_customer = new Customer($customerName);
    }

    public function setCustomer(Customer $customerName)
    {
        $this->_customer = new Customer($customerName);
    }

    public function getCustomerName()
    {
        return $this->_customer->getName();
    }
}

class Customer
{
    /** @var string $_name */
    protected $_name;

    public function __construct($name)
    {
        $this->_name = strval($name);
    }

    public function getName()
    {
        return $this->_name;
    }
}