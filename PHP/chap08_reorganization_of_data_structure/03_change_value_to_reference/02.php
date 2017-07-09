<?php

//クライアントコードは変更なし
function numberOfOrdersFor($customerName, array $orders)
{
    $numberOfOrder = 0;
    foreach ($orders as $order) {

        if ($order->getCustomerName() === $customerName) $numberOfOrder++;
    }
    return $numberOfOrder;
}

/**
 * Orderクラスは、Customerクラスのファクトリメソッドを使うように仕様変更。
 * これにより、複数のOrderクラスで、同じ顧客インスタンスを参照できるようになる。
 */
class Order
{
    /** @var Customer $_customer */
    protected $_customer;

    public function __construct($customerName)
    {
        $this->_customer = Customer::create($customerName);
    }

    public function setCustomer(Customer $customerName)
    {
        $this->_customer = Customer::create($customerName);
    }

    public function getCustomerName()
    {
        return $this->_customer->getName();
    }
}

/**
 * 顧客クラス。ここでは、スクリプト開始時点で
 * データソースから事前に顧客情報をロードし、
 * ファクトリメソッドで外部にインスタンスを提供する方式にした。
 */
class Customer
{
    /** @var Customer[] $_instances このクラスのインスタンスの集合。 */
    private static $_instances;
    
    /** @var string $_name */
    private $_name;

    /**
     * このクラスのファクトリメソッド。
     * 
     * (実際は、必要なクラスを事前ロードしておき、
     * ロード済みのインスタンスを返す)
     * 
     * @param $name
     * @return Customer|null
     */
    public static function create($name)
    {
        foreach (self::$_instances as $instance) {
            if ($instance->getName() === $name) return $instance;
        }
        return null;
    }

    /**
     * コンストラクタ。可視性をprivateにし、callできないようにしている。
     */
    private function __construct($name)
    {
        $this->_name = strval($name);
    }

    /**
     * マジックメソッド__cloneは可視性をprivateにしてオーバーライトしておくことで、
     * このクラスの複製ができないようにする。
     */
    private function __clone()
    {
    }

    /**
     * 顧客情報をまとめて読み取り、static変数$_instancesに格納しておく。
     * システム開始時点で呼び出すこと。
     */
    public static function loadCustomers()
    {
        //なんらかのデータソースから顧客情報をロードし、
        //一括プールする処理が入る
        //new Customer('Jhon').store();
    }

    /**
     * このインスタンスをプールしておく。
     */
    private function __store()
    {
        self::$_instances[] = $this;
    }
    

    public function getName()
    {
        return $this->_name;
    }
}