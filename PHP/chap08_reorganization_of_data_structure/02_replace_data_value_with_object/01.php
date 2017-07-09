<?php

/**
 * 以下のような例を想定する。
 * ・システム開発初期段階では、顧客情報を単なる文字列で扱っていた。
 * ・開発が進み、顧客を扱う処理が増えてきた
 * -> 顧客に関する情報をクラス化・カプセル化したい
 */

/**
 * 特定顧客に対する注文回数をカウントして返す
 *
 * @param  string  $customer 顧客名
 * @param  Order[] $orders
 * @return int
 */
function numberOfOrdersFor($customer, array $orders)
{
    $numberOfOrder = 0;
    foreach ($orders as $order) {
        if ($order->getCustomer === $customer) $numberOfOrder++;
    }
    return $numberOfOrder;
}

class Order
{
    /** @var string $_customer */
    protected $_customer;

    public function __construct($customer)
    {
        if (is_string($customer)) $this->_customer = $customer;
    }

    public function setCustomer($customer)
    {
        $this->_customer = $customer;
    }

    public function getCustomer()
    {
        return strval($this->_customer);
    }
}