<?php

/**
 * 随所にCustomerクラスのNullチェックが必要な、
 * 以下のようなコードを仮定する。
 */
$customer = $this->_site->getCustomer();

if (is_null($customer)) $plan = BillingPlan::basic();
else                    $plan = $customer->getPlan();

if (is_null($customer)) $customerName = "occupant";
else                    $customerName = $customer->getName();

if (is_null($customer)) $weeksDelinquent = 0;
else                    $weeksDelinquent = $customer->getHistory->getWeeksDelinquentInLastYear();

/**
 * 電気を使っている家や共同住宅を表すクラス。
 */
class Site
{
    /**  @var Customer $_customer */
    protected $_customer;

    public function getCustomer()
    {
        return $this->_customer;
    }
}

/**
 * 電力会社に対する顧客を表すクラス。
 */
class Customer
{
    public function getName()
    {
        //...
    }

    public function getPlan()
    {
        //...
    }

    public function getHistory()
    {
        //...
    }
}

/**
 * 顧客の支払い履歴を示すクラス。
 */
class PaymentHistory
{
    /**
     * 昨年度における、支払いを滞納した週の数を返す
     *
     * @return int
     */
    public function getWeeksDelinquentInLastYear()
    {
        //...
    }
}