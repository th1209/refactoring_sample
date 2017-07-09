<?php

//クライアント側のコード。
//カプセル化したメソッドを使うように変更している。
//また、引数名を変更し、String型であることが分かるようにしている。
function numberOfOrdersFor($customerName, array $orders)
{
    $numberOfOrder = 0;
    foreach ($orders as $order) {

        if ($order->getCustomerName() === $customerName) $numberOfOrder++;
    }
    return $numberOfOrder;
}


/**
 * Orderクラス。
 * Customerインスタンスを保持するように仕様変更。
 * また、ゲッタのシグネチャを変更し、顧客名を返すようにした。
 * (顧客自体のインスタンスを返すようにしてもいいかも)
 */
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

/**
 * これまで文字列として保持していた顧客情報をクラス化。
 * ※ここでは例示のため、単に顧客名だけ保持するようにしているが、
 *  実際の開発では、顧客を一意に識別する値を持たせるなどすべきだろう。
 *  また、顧客インスタンスが等しいかチェックするメソッドを追加するなどもあり。
 */
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